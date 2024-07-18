<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Include database connection file
include('./includes/db-con.php');

// Get the product_id from the query string and user_id from session
$product_id = $_GET['pid'];
$user_id = $_SESSION['user_id'];

// Sanitize inputs


// Check if the product is already in the wishlist
$query = "SELECT * FROM wishlist WHERE product_id = $product_id AND user_id = $user_id";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['error'] = "Product is already in your wishlist!";
    header("Location: index.php");
    exit;
} else {
    // Add the product to the wishlist
    $query = "INSERT INTO wishlist (product_id, user_id) VALUES ($product_id, $user_id)";
    if (mysqli_query($con, $query)) {
        $_SESSION['success'] = "Product added to your wishlist!";
        header("Location: index.php");
        exit;
    } else {
        echo "Error adding product to wishlist: " . mysqli_error($con);
    }
}

// Close the database connection
mysqli_close($con);
?>
