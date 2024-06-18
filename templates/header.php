<header>
    <nav style="margin-left: auto;">
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="profile.php">Welcome, <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'User'; ?>!</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        <?php endif; ?>
        <a href="index.php">Home</a>
    </nav>
</header>
