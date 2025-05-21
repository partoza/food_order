<?php

session_start();
include __DIR__ . '/../database/database.php';

try {

    // Only allow POST requests
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        $_SESSION['cart_error'] = 'Invalid request.';
        header('Location: ../shop-single.php?id=' . $product_id);
        exit;
    }

    $user_id    = (int) $_SESSION['user_id'];
    $product_id = isset($_POST['product_id']) ? (int) $_POST['product_id'] : 0;
    $quantity   = isset($_POST['quantity']) ? (int) $_POST['quantity'] : 1;

    if ($product_id <= 0 || $quantity <= 0) {
        $_SESSION['cart_error'] = 'Invalid product or quantity.';
        header('Location: ../shop-single.php?id=' . $product_id);
        exit;
    }

    // STEP 1: Check for existing cart
    $stmt = $conn->prepare("SELECT id FROM carts WHERE user_id = ?");
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($cart_id);
        $stmt->fetch();
    } else {
        // Create cart
        $insert = $conn->prepare("INSERT INTO carts (user_id) VALUES (?)");
        $insert->bind_param('i', $user_id);
        $insert->execute();
        $cart_id = $insert->insert_id;
        $insert->close();
    }
    $stmt->close();

    // STEP 2: Check if product already in cart
    $stmt = $conn->prepare("SELECT id, quantity FROM cart_items WHERE cart_id = ? AND product_id = ?");
    $stmt->bind_param('ii', $cart_id, $product_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($cart_item_id, $existing_qty);
        $stmt->fetch();
        $new_qty = $existing_qty + $quantity;

        $update = $conn->prepare("UPDATE cart_items SET quantity = ?, added_at = NOW() WHERE id = ?");
        $update->bind_param('ii', $new_qty, $cart_item_id);
        $update->execute();
        $update->close();
    } else {
        $insert = $conn->prepare("INSERT INTO cart_items (cart_id, product_id, quantity) VALUES (?, ?, ?)");
        $insert->bind_param('iii', $cart_id, $product_id, $quantity);
        $insert->execute();
        $insert->close();
    }
    $stmt->close();

    // Success feedback
    $_SESSION['cart_success'] = 'Item added to cart successfully.';
    header('Location: ../shop-single.php?id=' . $product_id);
    exit;

} catch (Exception $e) {
    $_SESSION['cart_error'] = 'An error occurred: ' . $e->getMessage();
    header('Location: ../shop-single.php?id=' . $product_id);
    exit;
}