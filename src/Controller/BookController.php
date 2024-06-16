<?php
require __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../helpers/BookLogger.php';
require_once __DIR__ . '/../../helpers/ShowError.php';

class BookController
{
    public function search()
    {
        global $pdo;
        try {
            $keyword = $_GET['q'] ?? '';
            $stmt = $pdo->prepare('SELECT * FROM books WHERE title LIKE ? OR author LIKE ? OR genre LIKE ?');
            $stmt->execute(["%$keyword%", "%$keyword%", "%$keyword%"]);
            $results = $stmt->fetchAll();

            if (empty($results)) {
                ShowError::show404Page();
            }

            return $results;
        } catch (PDOException $e) {
            BookLogger::logError($e);
            ShowError::show404Page();
        }
    }

    public function addBook()
    {
        global $pdo;
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $title = $_POST['title'];
                $author = $_POST['author'];
                $genre = $_POST['genre'];
                $published_year = $_POST['published_year'];
                $summary = $_POST['summary'];

                $stmt = $pdo->prepare('INSERT INTO books (title, author, genre, published_year, summary, created_at) VALUES (?, ?, ?, ?, ?, ?)');
                $stmt->execute([$title, $author, $genre, $published_year, $summary, date('Y-m-d H:i:s')]);

                header('Location: index.php');
            }
        } catch (PDOException $e) {
            BookLogger::logError($e);
            ShowError::show404Page();
        }
    }

    public function getAllBooks()
    {
        global $pdo;
        try {
            $stmt = $pdo->query('SELECT * FROM books');
            $results = $stmt->fetchAll();

            if (empty($results)) {
                ShowError::show404Page();
            }

            return $results;
        } catch (PDOException $e) {
            BookLogger::logError($e);
            ShowError::show404Page();
        }
    }

    public function getBook($book_id)
    {
        global $pdo;
        try {
            $stmt = $pdo->prepare('SELECT * FROM books WHERE id = ?');
            $stmt->execute([$book_id]);
            $book = $stmt->fetch();

            if (!$book) {
                ShowError::show404Page();
            }

            return $book;
        } catch (PDOException $e) {
            BookLogger::logError($e);
            ShowError::show404Page();
        }
    }
}
