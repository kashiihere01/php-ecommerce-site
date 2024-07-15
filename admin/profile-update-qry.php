<?php
require_once("./auth.php");

require_once("./db-con.php");
require_once "./includes/helpers.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // get data from form...
  
    $user_name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id = $_POST['id'];
    $mobile = $_POST['mobile'];


    // check if image is update or not
    if (empty($_FILES['new_image']['name'])) {
        $name = $_POST['old_image'];
    } else {
        $data = uploadImage("admin-users", $_FILES['new_image'], 3, "profile");

        if ($data['errors'] === false) {
            $name = $data['result'];
        }
    }

    // update qry run here....

    $query = "UPDATE `users` SET `username`='$user_name',`mobile`='$mobile',`email`='$email',`password`='$password',`image`='$name' WHERE `id`='$id'";

    if (mysqli_query($con, $query)) {

        $_SESSION['success'] = "Profile successfully updated...!";
        header("Location:profile.php");
    } else {
        $_SESSION['error'] = "Profile has not been updated...!";
        header("Location:profile.php");
    }
}


//exit;
