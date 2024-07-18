<?php
session_start();
require_once "./includes/db-con.php";

// Check if user is logged in
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    $_SESSION['error'] = "You need to be logged in to cancel orders.";
    header("Location: login.php");
    exit();
}

// Check if the order ID is provided
if (!isset($_GET['pid']) || empty($_GET['pid'])) {
    $_SESSION['error'] = "No order ID provided.";
    header("Location: orders.php");
    exit();
}

$order_id = intval($_GET['pid']);
$user_id = intval($_SESSION['user_id']);

// Update the order status to 'cancelled'
$update_query = "UPDATE orders SET status = 'cancelled' WHERE id = $order_id AND user_id = $user_id";

if (mysqli_query($con, $update_query)) {
    $_SESSION['success'] = "Order successfully cancelled.";
} else {
    $_SESSION['error'] = "Failed to cancel the order. Please try again.";
}

// Redirect back to the orders page
header("Location: orders.php");
exit();
?>
