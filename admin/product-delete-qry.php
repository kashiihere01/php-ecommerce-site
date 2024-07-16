<?php

require_once("./db-con.php");

session_start();

// Retrieve the product ID from the query string
$get_product_id = $_GET['id'];

// Fetch the product details to get the image filename
$product_query = "SELECT product_image FROM products WHERE id='$get_product_id'";
$product_result = mysqli_query($con, $product_query);

if ($product_result && mysqli_num_rows($product_result) > 0) {
    $product = mysqli_fetch_assoc($product_result);
    $image_name = $product['product_image'];

    // Delete the product record from the database
    $product_delete_qry = "DELETE FROM products WHERE id='$get_product_id'";

    if (mysqli_query($con, $product_delete_qry)) {
        // Define the path to the image directory
        $image_path = "images/product/" . $image_name; // Adjust the path to match your setup

        // Check if the file exists and delete it
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        // Set a success message in the session
        $_SESSION['success'] = "Operation Performed Successfully...!";
    } else {
        $_SESSION['error'] = "Failed to delete the product from the database.";
    }
} else {
    $_SESSION['error'] = "Product not found.";
}

// Redirect to the products page
header("Location: products.php");
exit;

?>
