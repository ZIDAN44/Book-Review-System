<?php
session_start();
require '../src/Controller/BookController.php';

$bookController = new BookController();
$books = $bookController->getAllBooks();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Book Library</title>
</head>
<body>
    <?php include '../templates/header.php'; ?>
    <div class="container">
        <h1 class="book-library-h1">Book Library</h1>
        <div class="book-list">
            <?php foreach ($books as $book): ?>
                        <div class="book-item">
                            <h2><a href="book.php?id=<?php echo htmlspecialchars($book['id']); ?>"><?php echo htmlspecialchars($book['title']); ?></a></h2>
                            <p><strong>Author:</strong> <?php echo htmlspecialchars($book['author']); ?></p>
                            <p><strong>Genre:</strong> <?php echo htmlspecialchars($book['genre']); ?></p>
                            <p><strong>Published Year:</strong> <?php echo htmlspecialchars($book['published_year']); ?></p>
                            <p><?php echo htmlspecialchars(substr($book['summary'], 0, 100)) . '...'; ?></p>
                        </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include '../templates/footer.php'; ?>
    <script src="../assets/js/script.js"></script>
</body>
</html>
