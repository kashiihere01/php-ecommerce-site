<?php
session_start();
require_once "./db-con.php";

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $order_id =$_GET['id'];
    $user_id = $_SESSION['user_id'];

    $delete_query = "DELETE FROM orders WHERE id = $order_id AND user_id = $user_id";

    if (mysqli_query($con, $delete_query)) {
        $_SESSION['success'] = "Order successfully deleted.";
        header("Location: orders.php");
exit();
    } else {
        $_SESSION['error'] = "Failed to delete the order. Please try again.";
    }
}


?>
