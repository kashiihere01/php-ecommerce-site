<?php
require_once("includes/db-con.php");

if ($_SERVER['REQUEST_METHOD'] === "POST" && $_POST['send'] === "send") {

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message  = htmlspecialchars($_POST['message']);

    // Insert into database
    $sql = "INSERT INTO users_messages (`name`, `email`, `message`) VALUES('$name', '$email', '$message') ";

    if (mysqli_query($con, $sql)) {
        // Send success email to user
        // $to = $email;
        // $subject = "Message Received";
        // $body = "Hi $name,\n\nThank you for reaching out to us. We have received your message:\n\n$message\n\nWe will get back to you shortly.\n\nBest regards,\nYour Company Name";
        // $headers = "From: km5712024@gmail.com";

        // if (mail($to, $subject, $body, $headers)) {
            $_SESSION['success'] = "Thank you for reaching out! You are an invaluable part of everything we do here....!";
            header("Location:contact.php");}
         else {
            $_SESSION['error'] = "Thank you for reaching out! You are an invaluable part of everything we do here....!";
            header("Location:contact.php");
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }

?>
