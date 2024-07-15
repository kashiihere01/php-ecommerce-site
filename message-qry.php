<?php
require_once("includes/db-con.php");

if ($_SERVER['REQUEST_METHOD'] === "POST" && $_POST['send'] === "send") {

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);


    $message  = $_POST['message'];
    

    // insert
    $sql = "INSERT INTO users_messages (`name`, `email`, `message`) VALUES('$name', '$email', '$message') ";

    if (mysqli_query($con, $sql)) {
echo "successfully submit";
        // header("Location:signup-form.php");
    }
}
