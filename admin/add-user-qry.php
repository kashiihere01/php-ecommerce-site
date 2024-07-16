<?php

session_start();
// db connection
require_once "./db-con.php";
require_once "./includes/helpers.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Upload image
    $data = uploadImage("admin-users", $_FILES['image'], 3, "add-user");

    if ($data['errors'] === false) {
        // Save info into db
        $imgName = $data['result'];

        // Escape user inputs (not necessary for password as it's hashed)
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $mobile = mysqli_real_escape_string($con, $_POST['mobile']);

        // Hash the password
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Build the query (ensure to concatenate escaped variables)
        $query = "INSERT INTO `users`(`username`, `email`, `password`, `mobile`, `image`) 
            VALUES ('$username', '$email', '$hashed_password', '$mobile', '$imgName')";

        // Execute the query
        if (mysqli_query($con, $query)) {
            $_SESSION['success'] = "Operation Performed Successfully...!";
        } else {
            $_SESSION['error'] = "Something went wrong...!";
        }
    } else {
        $_SESSION['imgErr'] = "Image uploading Error please Check...!";
    }

    // Redirect back to the add-user.php page
    header("Location: add-user.php");
    exit;
}

?>
