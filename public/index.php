<?php
session_start();
require '../src/Controller/BookController.php';

$bookController = new BookController();
$books = [];

if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
    $books = $bookController->searchBooks($searchQuery);
} else {
    $books = $bookController->getAllBooks();
}
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
        <h1>Book Library</h1>
        <form method="GET" action="index.php" class="search-form">
            <input type="text" name="search" placeholder="Search by title, author, genre">
            <button type="submit">Search</button>
        </form>
        <div class="book-list">
            <?php if (empty($books)): ?>
                <p class="no-books-found">Book not found!!</p>
            <?php else: ?>
                <?php foreach ($books as $book): ?>
                    <div class="book-item">
                        <h2><a href="book.php?id=<?php echo htmlspecialchars($book['id']); ?>"><?php echo htmlspecialchars($book['title']); ?></a></h2>
                        <p><strong>Author:</strong> <?php echo htmlspecialchars($book['author']); ?></p>
                        <p><strong>Genre:</strong> <?php echo htmlspecialchars($book['genre']); ?></p>
                        <p><strong>Published Year:</strong> <?php echo htmlspecialchars($book['published_year']); ?></p>
                        <p><?php echo htmlspecialchars(substr($book['summary'], 0, 100)) . '...'; ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php include '../templates/footer.php'; ?>
    <script src="../assets/js/script.js"></script>
</body>
</html>
