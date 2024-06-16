<?php
require __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../helpers/BookLogger.php';
require_once __DIR__ . '/../../helpers/ShowError.php';

class UserController
{
    public function register()
    {
        global $pdo;
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_POST['username'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $email = $_POST['email'];

                $stmt = $pdo->prepare('INSERT INTO users (username, password, email, created_at) VALUES (?, ?, ?, ?)');
                $stmt->execute([$username, $password, $email, date('Y-m-d H:i:s')]);

                header('Location: login.php');
            }
        } catch (PDOException $e) {
            BookLogger::logError($e);
            ShowError::show404Page();
        }
    }

    public function login()
    {
        global $pdo;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('Location: index.php');
                exit;
            } else {
                // Set an error message in session
                $_SESSION['error_message'] = 'Invalid username or password!';
            }
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: login.php');
    }
}
