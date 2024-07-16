<?php
session_start();

require_once "db-con.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verify inputs are not empty
    if ($email == "" || $password == "") {
        $_SESSION['error'] = "All fields are required...!";
        header("Location: login.php");
        exit;
    }

    // Fetch user by email (assuming email is unique)
    $sel_sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $exists = mysqli_query($con, $sel_sql);

    if (mysqli_num_rows($exists) === 0) {
        $_SESSION['invalid'] = "Invalid Credentials...!";
        header("Location: login.php");
        exit;
    }

    // Fetch user data
    $user = mysqli_fetch_assoc($exists);

    // Verify hashed password
    if (password_verify($password, $user['password'])) {
        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
        exit;
    } else {
        $_SESSION['invalid'] = "Invalid Credentials...!";
        header("Location: login.php");
        exit;
    }
}
?>
