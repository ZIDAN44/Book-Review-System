<?php
require '../src/Controller/ReviewController.php';
require '../src/Controller/BookController.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$reviewController = new ReviewController();
$bookController = new BookController();

$book_id = $_GET['book_id'];
$user_id = $_SESSION['user_id'];
$userReview = $reviewController->getUserReview($book_id, $user_id);

$book = $bookController->getBook($book_id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_POST['book_id'] = $book_id;
    $reviewController->addReview();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Review</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="edit-review-page">
    <?php include '../templates/header.php'; ?>
    <div class="container">
        <h1>Edit your review for <span class="book-title">"<?php echo htmlspecialchars($book['title']); ?>"</span></h1>
        <form method="POST" action="edit_review.php?book_id=<?php echo $book_id; ?>">
            <div class="review-form">
                <div class="star-rating-container">
                    <label for="rating">Rating:</label>
                    <div class="star-rating">
                        <input type="radio" name="rating" value="5" id="5" <?php if ($userReview['rating'] == 5)
                            echo 'checked'; ?>><label for="5">☆</label>
                        <input type="radio" name="rating" value="4" id="4" <?php if ($userReview['rating'] == 4)
                            echo 'checked'; ?>><label for="4">☆</label>
                        <input type="radio" name="rating" value="3" id="3" <?php if ($userReview['rating'] == 3)
                            echo 'checked'; ?>><label for="3">☆</label>
                        <input type="radio" name="rating" value="2" id="2" <?php if ($userReview['rating'] == 2)
                            echo 'checked'; ?>><label for="2">☆</label>
                        <input type="radio" name="rating" value="1" id="1" <?php if ($userReview['rating'] == 1)
                            echo 'checked'; ?>><label for="1">☆</label>
                    </div>
                </div>
                <div class="review-text">
                    <label for="review">Review:</label>
                    <textarea name="review" required><?php echo htmlspecialchars($userReview['review']); ?></textarea>
                </div>
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
    <?php include '../templates/footer.php'; ?>
    <script src="../assets/js/script.js"></script>
</body>
</html>
