<?php

require_once("./db-con.php");

$get_cat_id = $_GET['id'];

// Start the session
session_start();

// Fetch the category image
$category_image_qry = "SELECT category_image FROM categories WHERE id='$get_cat_id'";
$category_image_result = mysqli_query($con, $category_image_qry);

if ($category_image_result && mysqli_num_rows($category_image_result) > 0) {
    $category = mysqli_fetch_assoc($category_image_result);
    $category_image_name = $category['category_image'];
    $category_image_path = "categories/images/" . $category_image_name; // Adjust the path to match your setup

    // Delete the category image from the server
    if (file_exists($category_image_path)) {
        if (unlink($category_image_path)) {
            echo "Category image deleted successfully.<br>";
        } else {
            echo "Failed to delete category image.<br>";
        }
    } else {
        echo "Category image not found: $category_image_path<br>";
    }

    // Fetch the product images associated with the category
    $product_images_qry = "SELECT product_image FROM products WHERE category_id='$get_cat_id'";
    $product_images_result = mysqli_query($con, $product_images_qry);

    if ($product_images_result) {
        // Delete product images from the server
        while ($product = mysqli_fetch_assoc($product_images_result)) {
            $image_name = $product['product_image'];
            $image_path = "product/images/" . $image_name; // Adjust the path to match your setup

            if (file_exists($image_path)) {
                if (unlink($image_path)) {
                    echo "Product image $image_name deleted successfully.<br>";
                } else {
                    echo "Failed to delete product image: $image_name<br>";
                }
            } else {
                echo "Product image not found: $image_path<br>";
            }
        }

        // Delete the products associated with the category
        $product_delete_qry = "DELETE FROM products WHERE category_id='$get_cat_id'";

        if (mysqli_query($con, $product_delete_qry)) {
            // Delete the category record from the database
            $category_delete_qry = "DELETE FROM categories WHERE id='$get_cat_id'";

            if (mysqli_query($con, $category_delete_qry)) {
                $_SESSION['success'] = "Operation Performed Successfully...!";
            } else {
                $_SESSION['error'] = "Failed to delete the category from the database.";
            }
        } else {
            $_SESSION['error'] = "Failed to delete the products from the database.";
        }
    } else {
        $_SESSION['error'] = "Failed to retrieve product images.";
    }
} else {
    $_SESSION['error'] = "Failed to retrieve category image.";
}

// Redirect to the categories page
header("Location: categories.php");
exit;

?>
