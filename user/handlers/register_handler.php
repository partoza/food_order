<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_order";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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

        // Validate passwords match
        if ($password !== $confirm_password) {
            $_SESSION['errors'] = "Passwords do not match!";
            header("Location: ../register.php");
            exit;
        }

        // Check if username exists
        if (username_exists($conn, $username)) {
            $_SESSION['errors'] = "Username already taken!";
            header("Location: ../register.php");
            exit;
        }

        // Check if email exists
        if (email_exists($conn, $email)) {
            $_SESSION['errors'] = "Email already registered!";
            header("Location: ../register.php");
            exit;
        }

        // Create account
        if (create_account($conn, $first_name, $last_name, $username, $email, $password, $contact)) {
            $_SESSION['success'] = "Registration successful! Please login.";
            header("Location: ../login.php");
            exit;
        } else {
            $_SESSION['errors'] = "Account creation failed!";
            header("Location: ../register.php");
            exit;
        }
    }
} catch (Exception $e) {
    $_SESSION['errors'] = "An error occurred: " . $e->getMessage();
    header("Location: ../register.php");
    exit;
}

function username_exists($conn, $username) {
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    if (!$stmt) {
        throw new Exception("Database error: " . $conn->error);
    }
    
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    
    return $stmt->num_rows > 0;
}

function email_exists($conn, $email) {
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    if (!$stmt) {
        throw new Exception("Database error: " . $conn->error);
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
        throw new Exception("Database error: " . $conn->error);
    }
    
    $stmt->bind_param("ssssss", $first_name, $last_name, $username, $email, $hashed_password, $contact);
    return $stmt->execute();
}

$conn->close();
?>