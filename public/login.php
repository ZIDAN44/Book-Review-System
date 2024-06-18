<?php
require '../src/Controller/UserController.php';
session_start();
$controller = new UserController();
$controller->login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="login-page">
    <?php include '../templates/header.php'; ?>
    <div class="container">
        <div class="login-container">
            <?php if (isset($_SESSION['error_message'])): ?>
                    <p class="error-message"><?php echo $_SESSION['error_message']; ?></p>
                    <?php unset($_SESSION['error_message']); ?>
            <?php endif; ?>
            <form method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" id="login-button">Login</button>
            </form>
        </div>
    </div>
    <?php include '../templates/footer.php'; ?>
    <script src="../assets/js/script.js"></script>
</body>
</html>
