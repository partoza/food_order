<?php

session_start();
include __DIR__ . '/../database/database.php';

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username_input = trim($_POST['username'] ?? '');
        $password_input = $_POST['password'] ?? '';

        // Basic empty‐field check
        if ($username_input === '' || $password_input === '') {
            $_SESSION['login_errors'] = 'Please enter both username and password.';
            header('Location: ../login.php');
            exit;
        }

        // 2) Prepare & execute your query
        $stmt = $conn->prepare('SELECT id, username, password_hash FROM users WHERE username = ?');
        if (! $stmt) {
            throw new Exception('Database error: ' . $conn->error);
        }
        $stmt->bind_param('s', $username_input);
        $stmt->execute();
        $result = $stmt->get_result();

        // 3) Check lookup & verify password
        if ($user = $result->fetch_assoc()) {
            if (password_verify($password_input, $user['password_hash'])) {
                
                // 4) Success! store whatever you need in session
                $_SESSION['user_id']   = $user['id'];
                $_SESSION['username']  = $user['username'];

                // optional: generate token if you want
                $_SESSION['access_token'] = bin2hex(random_bytes(32));

                header('Location: ../index-2.php');
                exit;
            }
        }

        // 5) Fallthrough = invalid credentials
        $_SESSION['login_errors'] = 'Invalid credentials. Please try again.';
        header('Location: ../login.php');
        exit;
    }
} catch (Exception $e) {
    // unexpected errors
    $_SESSION['login_errors'] = 'An error occurred: ' . $e->getMessage();
    header('Location: ../login.php');
    exit;
}
