<?php
session_start();
require '../src/Controller/UserController.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$controller = new UserController();
$userProfile = $controller->getUserProfile($_SESSION['user_id']);
$userReviews = $controller->getUserReviews($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include '../templates/header.php'; ?>
    <div class="container">
        <h1>User Profile</h1>
        <?php if ($userProfile): ?>
                <ul>
                    <li><strong>User ID:</strong> <?php echo htmlspecialchars($userProfile['id']); ?></li>
                    <li><strong>User Name:</strong> <?php echo htmlspecialchars($userProfile['username']); ?></li>
                    <li><strong>Email:</strong> <?php echo htmlspecialchars($userProfile['email']); ?></li>
                    <li><strong>Created At:</strong> <?php echo htmlspecialchars($userProfile['created_at']); ?></li>
                </ul>
        <?php else: ?>
                <p>User not found.</p>
        <?php endif; ?>

        <h2>Books Reviewed</h2>
        <?php if ($userReviews): ?>
                <ul>
                    <?php foreach ($userReviews as $review): ?>
                            <li>
                                <h3><?php echo htmlspecialchars($review['title']); ?></h3>
                                <p><strong>Author:</strong> <?php echo htmlspecialchars($review['author']); ?></p>
                                <p><strong>Rating:</strong> <?php echo htmlspecialchars($review['rating']); ?>/5</p>
                                <p><?php echo htmlspecialchars($review['review']); ?></p>
                            </li>
                    <?php endforeach; ?>
                </ul>
        <?php else: ?>
                <p>No reviews found.</p>
        <?php endif; ?>
    </div>
    <?php include '../templates/footer.php'; ?>
    <script src="../assets/js/script.js"></script>
</body>
</html>
