<?php
require '../src/Controller/UserController.php';
$controller = new UserController();
$controller->register();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="register-page">
    <?php include '../templates/header.php'; ?>
    <div class="container">        
        <div class="register-container">
            <form method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="email" name="email" placeholder="Email" required>
                <button type="submit" id="register-button">Register</button>
            </form>
        </div>
    </div>
    <?php include '../templates/footer.php'; ?>
    <script src="../assets/js/script.js"></script>
</body>
</html>
