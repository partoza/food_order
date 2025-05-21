<?php
session_start();
include '../database/database.php';

$cart_item_id = (int)($_GET['id'] ?? 0);
if ($cart_item_id > 0) {
    $stmt = $conn->prepare("DELETE FROM cart_items WHERE id = ?");
    $stmt->bind_param("i", $cart_item_id);
    $stmt->execute();
}
header("Location: ../shoping-cart.php");