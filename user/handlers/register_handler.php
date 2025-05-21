<?php
include "../database/database.php";
session_start();

try {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $contact = $_POST['contact'];

        if ($password !== $confirm_password) {
            $_SESSION['errors'] = "Passwords do not match!";
            header("Location: ../registration.php");
            exit;
        }

        if (username_exists($conn, $username)) {
            $_SESSION['errors'] = "Username already taken!";
            header("Location: ../registration.php");
            exit;
        }

        if (email_exists($conn, $email)) {
            $_SESSION['errors'] = "Email already registered!";
            header("Location: ../registration.php");
            exit;
        }

        if (create_account($conn, $first_name, $last_name, $username, $email, $password, $contact)) {
            $_SESSION['success'] = "Registration successful! Please login.";
            header("Location: ../login.php");
            exit;
        } else {
            $_SESSION['errors'] = "Account creation failed!";
            header("Location: ../registration.php");
            exit;
        }
    }
} catch (Exception $e) {
    $_SESSION['errors'] = "An error occurred: " . $e->getMessage();
    header("Location: ../registration.php");
    exit;
}

function username_exists($conn, $username) {
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    if (!$stmt) {
        return false;
    }
    
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    
    return $stmt->num_rows > 0;
}

function email_exists($conn, $email) {
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    if (!$stmt) {
        return false;
    }
    
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    return $stmt->num_rows > 0;
}

function create_account($conn, $first_name, $last_name, $username, $email, $password, $contact) {
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, username, email, password_hash, contact) VALUES (?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        return false;
    }
    
    $stmt->bind_param("ssssss", $first_name, $last_name, $username, $email, $hashed_password, $contact);
    return $stmt->execute();
}

$conn->close();
?>