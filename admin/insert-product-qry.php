<?php
// db connection
require_once "./db-con.php";
require_once "./includes/helpers.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate form inputs
    $productName = trim($_POST['name']);
    $productPrice = trim($_POST['unit_price']);
    $categoryId = trim($_POST['category']);
    $productDescription = trim($_POST['description']);
    
    if (empty($productName) || empty($productPrice) || empty($categoryId) || empty($_FILES['image']['name'])) {
        echo "<div class='alert alert-danger mt-2'>All fields are required.</div>";
    } else {
        // Upload image
        $data = uploadImage("product", $_FILES['image'], 3, "products");

        if ($data['errors'] === false) {
            // Escape user inputs for SQL
            $productName = mysqli_real_escape_string($con, $productName);
            $productPrice = mysqli_real_escape_string($con, $productPrice);
            $categoryId = mysqli_real_escape_string($con, $categoryId);
            $productDescription = mysqli_real_escape_string($con, $productDescription);
            $imageName = mysqli_real_escape_string($con, $data['result']);

            $query = "INSERT INTO `products` (`product_name`, `product_price`, `category_id`, `product_image`, `product_description`) 
                      VALUES ('$productName', '$productPrice', '$categoryId', '$imageName', '$productDescription')";

            if (mysqli_query($con, $query)) {
                header("Location: products.php");
                exit;
            } else {
                echo "<div class='alert alert-danger mt-2'>Query Failed</div>";
            }
        } else {
            echo "<div class='alert alert-danger mt-2 uploadingErr'>{$data['result']}</div>";
        }
    }
}
?>
