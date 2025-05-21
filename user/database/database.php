<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_order";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$checkDbQuery = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname'";
$result = $conn->query($checkDbQuery);

if ($result->num_rows == 0) {
    if (!$conn->query("CREATE DATABASE `$dbname`")) {
        die("Error creating database: " . $conn->error);
    }
}

$conn->select_db($dbname);

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    contact VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX (username),
    INDEX (email)
)";

// first time on, uncomment this, just comment once db already created

 if ($conn->query($sql) === TRUE) {
  echo "Table 'users' created successfully or already exists.";
 } else {
     echo "Error creating table: " . $conn->error;
 }

?>