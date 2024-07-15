<?php
require_once("./auth.php");

require_once("./db-con.php");
require_once "./includes/helpers.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // get data from form...
  
    $product_name = $_POST['name'];
    $product_price = $_POST['unit_price'];

    $id = $_POST['id'];
    $product_description = $_POST['description'];


    // check if image is update or not
    if (empty($_FILES['new_image']['name'])) {
        $name = $_POST['old_image'];
    } else {
        $data = uploadImage("product", $_FILES['new_image'], 3, "products");

        if ($data['errors'] === false) {
            $name = $data['result'];
        }
    }

    // update qry run here....

    $query = "UPDATE `products` SET `product_name`='$product_name',
    `product_description`='$product_description',`product_price`='$product_price',
    `product_image`='$name' WHERE `id`='$id'";

    if (mysqli_query($con, $query)) {

        $_SESSION['success'] = "Category has been added successfully...!";
        header("Location:products.php");
    } else {
        $_SESSION['error'] = "Category has not been updated...!";
        header("Location:products.php");
    }
}


//exit;
