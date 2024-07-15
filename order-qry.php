<?php

session_start();
// db connection
require_once "./includes/db-con.php";

// Debug: Check if the script is receiving the POST request and 'order' key
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['order'])) {
      

        // Validate and sanitize input
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $product = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
        $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $zip = filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_STRING);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        $user = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
echo("$product");
exit;
        // Check for required fields
        

            // Prepare the query
            $query = "INSERT INTO `orders` (`name`, `email`, `city`, `mobile`, `zip`, `address`, `user_id`, `product_id`) 
                      VALUES ('$name', '$email', '$city', '$mobile', '$zip', '$address', '$user', '$product')";

            // Debug: Print the query string
          
            // Execute the query
            if (mysqli_query($con, $query)) {
                $_SESSION['success'] = "Operation performed successfully!";
                header("Location: checkout.php");
                exit();
            } else {
                // Debug: Print error message from MySQL
                echo "Error: " . mysqli_error($con);
                exit;
            }
        } else {
            $_SESSION['error'] = "Please fill in all required fields.";
            header("Location: checkout.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Order key not set in POST request.";
        header("Location: checkout.php");
        exit();
    }

