<?php
require '../src/Controller/ReviewController.php';
require '../src/Controller/BookController.php';
session_start();

$reviewController = new ReviewController();
$bookController = new BookController();

$book_id = $_GET['id'];
$book = $bookController->getBook($book_id);
$reviews = $reviewController->getReviews($book_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($book['title']); ?></title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js" defer></script>
</head>
<body>
    <?php include '../templates/header.php'; ?>
    <div class="container">
        <h1><?php echo htmlspecialchars($book['title']); ?></h1>
        <p>Author: <?php echo htmlspecialchars($book['author']); ?></p>
        <p>Genre: <?php echo htmlspecialchars($book['genre']); ?></p>
        <p>Published: <?php echo htmlspecialchars($book['published_year']); ?></p>
        <p><?php echo htmlspecialchars($book['summary']); ?></p>

        <h2>Reviews</h2>
        <ul>
            <?php foreach ($reviews as $review): ?>
                        <li>
                            <strong><?php echo htmlspecialchars($review['username']); ?></strong> rated <?php echo htmlspecialchars($review['rating']); ?>/5
                            <p><?php echo htmlspecialchars($review['review']); ?></p>
                        </li>
            <?php endforeach; ?>
        </ul>

        <?php if (isset($_SESSION['user_id'])): ?>
                    <?php
                    $userReview = $reviewController->getUserReview($book_id, $_SESSION['user_id']);
                    ?>
                    <?php if ($userReview): ?>
                                <h2>Your Review</h2>
                                <p><strong>Your Rating:</strong> <?php echo htmlspecialchars($userReview['rating']); ?>/5</p>
                                <p><strong>Your Review:</strong> <?php echo htmlspecialchars($userReview['review']); ?></p>
                                <a href="edit_review.php?book_id=<?php echo $book_id; ?>">Edit your review</a>
                    <?php else: ?>
                                <h2>Add a review</h2>
                                <form id="reviewForm" method="POST" action="add_review.php">
                                    <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">
                                    <div class="star-rating-container">
                                        <label for="rating">Rating:</label>
                                        <div class="star-rating" id="starRating">
                                            <input type="radio" name="rating" value="5" id="5" required><label for="5">☆</label>
                                            <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                            <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                            <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                            <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                        </div>
                                    </div>
                                    <label for="review">Review:</label>
                                    <textarea name="review" id="reviewText" required></textarea>
                                    <button type="submit" id="submitButton" disabled>Submit</button>
                                </form>
                    <?php endif; ?>
        <?php else: ?>
                    <p><a href="login.php">Log in</a> to add a review.</p>
        <?php endif; ?>
    </div>
    <?php include '../templates/footer.php'; ?>
</body>
</html>
