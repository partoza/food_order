<?php

session_start();
include __DIR__ . '/../database/database.php';

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        $_SESSION['order_error'] = 'Invalid request.';
        header('Location: ../shoping-cart.php');
        exit;
    }

    if (!isset($_SESSION['user_id'])) {
        $_SESSION['order_error'] = 'You must be logged in to place an order.';
        header('Location: ../login.php');
        exit;
    }

    $user_id = (int) $_SESSION['user_id'];

    // Step 1: Fetch the user's cart and items
    $stmt = $conn->prepare("SELECT id FROM carts WHERE user_id = ?");
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 0) {
        $_SESSION['order_error'] = 'No cart found.';
        header('Location: ../shoping-cart.php');
        exit;
    }

    $stmt->bind_result($cart_id);
    $stmt->fetch();
    $stmt->close();

    // Get cart items
    $stmt = $conn->prepare("SELECT ci.product_id, ci.quantity, p.price FROM cart_items ci
                            JOIN products p ON ci.product_id = p.id
                            WHERE ci.cart_id = ?");
    $stmt->bind_param('i', $cart_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        $_SESSION['order_error'] = 'Your cart is empty.';
        header('Location: ../shoping-cart.php');
        exit;
    }

    // Calculate total and prepare order items
    $total = 0;
    $order_items = [];

    while ($row = $result->fetch_assoc()) {
        $subTotal = $row['price'] * $row['quantity'];
        $total += $subTotal;
        $order_items[] = [
            'product_id' => $row['product_id'],
            'quantity'   => $row['quantity'],
            'price'      => $row['price']
        ];
    }

    $stmt->close();

    // Step 2: Insert order
    $stmt = $conn->prepare("INSERT INTO orders (user_id, total) VALUES (?, ?)");
    $stmt->bind_param('id', $user_id, $total);
    $stmt->execute();
    $order_id = $stmt->insert_id;
    $stmt->close();

    // Step 3: Insert order items
    $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
    foreach ($order_items as $item) {
        $stmt->bind_param('iiid', $order_id, $item['product_id'], $item['quantity'], $item['price']);
        $stmt->execute();
    }
    $stmt->close();

    // Step 4: Clear cart
    $conn->begin_transaction();
    $conn->query("DELETE FROM cart_items WHERE cart_id = $cart_id");
    $conn->query("DELETE FROM carts WHERE id = $cart_id");
    $conn->commit();

    $_SESSION['order_success'] = 'Your order has been placed successfully.';
    header('Location: ../index-2.php');
    exit;

} catch (Exception $e) {
    $conn->rollback();
    $_SESSION['order_error'] = 'An error occurred: ' . $e->getMessage();
    header('Location: ../shoping-cart.php');
    exit;
}