<?php
require '../src/Controller/BookController.php';
$controller = new BookController();
$books = $controller->search();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Books</title>
</head>
<body>
    <form method="GET">
        <input type="text" name="q" placeholder="Search by title, author, genre">
        <button type="submit">Search</button>
    </form>

    <ul>
        <?php foreach ($books as $book): ?>
                    <li><?php echo htmlspecialchars($book['title']); ?> by <?php echo htmlspecialchars($book['author']); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
