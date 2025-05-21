<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_order";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$checkDbQuery = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname'";
$result = $conn->query($checkDbQuery);

if ($result->num_rows == 0) {
    if (!$conn->query("CREATE DATABASE `$dbname`")) {
        die("Error creating database: " . $conn->error);
    }
}

$conn->select_db($dbname);

// 1. users table
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
$conn->query($sql);

// 2. products table
$sqlProducts = "CREATE TABLE IF NOT EXISTS products (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category VARCHAR(100),
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    image_path VARCHAR(255)
)";
$conn->query($sqlProducts);

// 3. carts table
$sql2 = "CREATE TABLE IF NOT EXISTS carts (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(11) UNSIGNED NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)";
$conn->query($sql2);

// 4. cart_items table
$sql3 = "CREATE TABLE IF NOT EXISTS cart_items (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  cart_id INT(11) UNSIGNED NOT NULL,
  product_id INT(11) UNSIGNED NOT NULL,
  quantity INT(11) UNSIGNED NOT NULL DEFAULT 1,
  added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (cart_id) REFERENCES carts(id) ON DELETE CASCADE,
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
)";
$conn->query($sql3);

// 5. orders table
$sqlOrders = "CREATE TABLE IF NOT EXISTS orders (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) UNSIGNED NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    status ENUM('pending', 'processing', 'completed', 'cancelled') DEFAULT 'pending',
    ordered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)";
$conn->query($sqlOrders);

// 6. order_items table
$sqlOrderItems = "CREATE TABLE IF NOT EXISTS order_items (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id INT(11) UNSIGNED NOT NULL,
    product_id INT(11) UNSIGNED NOT NULL,
    quantity INT(11) NOT NULL DEFAULT 1,
    price DECIMAL(10,2) NOT NULL, -- store price at time of order
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
)";
$conn->query($sqlOrderItems);

// 5. Insert sample products (only if table is empty)
$checkProducts = $conn->query("SELECT COUNT(*) as count FROM products");
$row = $checkProducts->fetch_assoc();
if ((int)$row['count'] === 0) {
    $conn->query("INSERT INTO products (name, category, price, description, image_path) VALUES
    ('Chicken Burger', 'burgers', 17.00, 'Our flavors & ingredients to build our local burgers.', 'assets/images/resource/products/4.jpg'),
    ('Soft Drink', 'beverages', 17.00, 'Our flavors & ingredients to build our local burgers.', 'assets/images/resource/products/5.jpg'),
    ('Pizza 2', 'pizza', 17.00, 'Our flavors & ingredients to build our local burgers.', 'assets/images/resource/products/6.jpg'),
    ('Burger 2', 'burgers', 17.00, 'Our flavors & ingredients to build our local burgers.', 'assets/images/resource/products/1.jpg'),
    ('Pizza 1', 'pizza', 17.00, 'Our flavors & ingredients to build our local burgers.', 'assets/images/resource/products/2.jpg'),
    ('Burger 1', 'burgers', 17.00, 'Our flavors & ingredients to build our local burgers.', 'assets/images/resource/products/1.jpg'),
    ('Fries', 'fries', 17.00, 'Our flavors & ingredients to build our local burgers.', 'assets/images/resource/products/3.jpg')");
}

?>