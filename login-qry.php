<?php


session_start();
require_once "./includes/db-con.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verify inputs are correct
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "All fields are required!";
        header("Location: login.php");
        exit();
    }

    // Verify user exists
    $sel_sql = "SELECT * FROM customers WHERE email='$email'";
    $exists = mysqli_query($con, $sel_sql);

    if (mysqli_num_rows($exists) === 0) {
        $_SESSION['error'] = "Invalid Credentials!";
        header("Location: login.php");
        exit();
    }

    // If user exists, verify its password is correct
    $user = mysqli_fetch_assoc($exists);

    if (!password_verify($password, $user['password'])) {
        $_SESSION['error'] = "Invalid Credentials!";
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
    }
}