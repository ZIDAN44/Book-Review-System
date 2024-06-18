<?php
require __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../helpers/BookLogger.php';
require_once __DIR__ . '/../../helpers/ShowError.php';

class ReviewController
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function addReview()
    {
        global $pdo;
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
                $book_id = $_POST['book_id'];
                $rating = $_POST['rating'];
                $review = $_POST['review'];

                // Check if the user already has a review for this book
                $stmt = $pdo->prepare('SELECT * FROM reviews WHERE user_id = ? AND book_id = ?');
                $stmt->execute([$user_id, $book_id]);
                $existingReview = $stmt->fetch();

                if ($existingReview) {
                    // Update existing review
                    $stmt = $pdo->prepare('UPDATE reviews SET rating = ?, review = ?, updated_at = ? WHERE user_id = ? AND book_id = ?');
                    $stmt->execute([$rating, $review, date('Y-m-d H:i:s'), $user_id, $book_id]);
                } else {
                    // Insert new review
                    $stmt = $pdo->prepare('INSERT INTO reviews (user_id, book_id, rating, review, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NULL)');
                    $stmt->execute([$user_id, $book_id, $rating, $review, date('Y-m-d H:i:s')]);
                }

                header('Location: book.php?id=' . $book_id);
            }
        } catch (PDOException $e) {
            BookLogger::logError($e);
            ShowError::show404Page();
        }
    }

    public function updateReview($data)
    {
        global $pdo;
        try {
            $review_id = $data['review_id'];
            $rating = $data['rating'];
            $review = $data['review'];

            // Update the review
            $stmt = $pdo->prepare('UPDATE reviews SET rating = ?, review = ?, updated_at = ? WHERE id = ?');
            $stmt->execute([$rating, $review, date('Y-m-d H:i:s'), $review_id]);

            // Redirect to appropriate page
            header('Location: book.php?id=' . $data['book_id']);
        } catch (PDOException $e) {
            BookLogger::logError($e);
            ShowError::show404Page();
        }
    }

    public function getReviews($book_id)
    {
        global $pdo;
        try {
            $stmt = $pdo->prepare('SELECT r.*, u.username FROM reviews r JOIN users u ON r.user_id = u.id WHERE r.book_id = ?');
            $stmt->execute([$book_id]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            BookLogger::logError($e);
            ShowError::show404Page();
        }
    }

    public function getUserReview($book_id, $user_id)
    {
        global $pdo;
        try {
            $stmt = $pdo->prepare('SELECT * FROM reviews WHERE book_id = ? AND user_id = ?');
            $stmt->execute([$book_id, $user_id]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            BookLogger::logError($e);
            ShowError::show404Page();
        }
    }

    public function getReviewById($review_id)
    {
        global $pdo;
        try {
            $stmt = $pdo->prepare('SELECT * FROM reviews WHERE id = ?');
            $stmt->execute([$review_id]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            BookLogger::logError($e);
            ShowError::show404Page();
        }
    }
}
