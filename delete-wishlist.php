<?php
session_start();
require_once "./includes/db-con.php";

// Check if user is logged in
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    $_SESSION['error'] = "You need to be logged in to delete items from your wishlist.";
    header("Location: login.php");
    exit();
}

// Check if the wishlist item ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    $_SESSION['error'] = "No wishlist item ID provided.";
    header("Location: wishlist.php");
    exit();
}

$wishlist_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

// Delete the wishlist item
$delete_query = "DELETE FROM wishlist WHERE id = $wishlist_id AND user_id = $user_id";

if (mysqli_query($con, $delete_query)) {
    $_SESSION['success'] = "Item successfully removed from your wishlist.";
} else {
    $_SESSION['error'] = "Failed to remove item from wishlist. Please try again.";
}

// Redirect back to the wishlist page
header("Location: wishlist.php");
exit();
?>
