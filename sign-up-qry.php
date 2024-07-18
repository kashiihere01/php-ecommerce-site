<?php
session_start();
require_once("includes/db-con.php"); // Include your database configuration file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and filter form data
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_NUMBER_INT);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format.";
        header("Location: register.php");
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the user already exists
    $query = "SELECT * FROM customers WHERE name = '$name' AND email = '$email'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        // User with the same name and email exists
        $_SESSION['error'] = "User with the same name and email already exists.";
        header("Location: registrater.php");
        exit();
    } else {
        // Insert new user into the database
        $query = "INSERT INTO customers (name, mobile, email, password, city) VALUES ('$name', '$mobile', '$email', '$hashed_password', '$city')";
        if (mysqli_query($con, $query)) {
            // Registration successful
            $_SESSION['success'] = "Registration successful. You can now log in.";
            header("Location: login.php");
            exit();
        } else {
            // Error occurred during registration
            $_SESSION['error'] = "An error occurred during registration. Please try again.";
            header("Location: register.php");
            exit();
        }
    }

    // Close connection
    mysqli_close($con);
}
?>
