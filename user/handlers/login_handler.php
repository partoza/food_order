<?php

session_start();
include __DIR__ . '/../database/database.php';

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username_input = trim($_POST['username'] ?? '');
        $password_input = $_POST['password'] ?? '';

        if ($username_input === '' || $password_input === '') {
            $_SESSION['login_errors'] = 'Please enter both username and password.';
            header('Location: ../login.php');
            exit;
        }

        $stmt = $conn->prepare('SELECT id, username, password_hash FROM users WHERE username = ?');
        if (! $stmt) {
            throw new Exception('Database error: ' . $conn->error);
        }
        $stmt->bind_param('s', $username_input);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($user = $result->fetch_assoc()) {
            if (password_verify($password_input, $user['password_hash'])) {
                
                $_SESSION['user_id']   = $user['id'];
                $_SESSION['username']  = $user['username'];
                $_SESSION['access_token'] = bin2hex(random_bytes(32));
                $_SESSION['login_time']   = time();

                header('Location: ../index-2.php');
                exit;
            }
        }

        $_SESSION['login_errors'] = 'Invalid credentials. Please try again.';
        header('Location: ../login.php');
        exit;
    }
} catch (Exception $e) {
    $_SESSION['login_errors'] = 'An error occurred: ' . $e->getMessage();
    header('Location: ../login.php');
    exit;
}
