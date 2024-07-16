<?php

require_once("./db-con.php");

session_start();

// Retrieve the user ID from the query string
$get_user_id = $_GET['id'];

// Fetch the user details to get the image filename
$user_query = "SELECT user_image FROM users WHERE id='$get_user_id'";
$user_result = mysqli_query($con, $user_query);

if ($user_result && mysqli_num_rows($user_result) > 0) {
    $user = mysqli_fetch_assoc($user_result);
    $image_name = $user['user_image'];

    // Define the path to the image directory
    $image_path = "admin-users/images/" . $image_name; // Adjust the path to match your setup

    // Check if the file exists and delete it
    if (file_exists($image_path)) {
        unlink($image_path);
    }

    // Delete the user record from the database
    $user_delete_qry = "DELETE FROM users WHERE id='$get_user_id'";

    if (mysqli_query($con, $user_delete_qry)) {
        // Set a success message in the session
        $_SESSION['success'] = "Operation Performed Successfully...!";
    } else {
        $_SESSION['error'] = "Failed to delete the user from the database.";
    }
} else {
    $_SESSION['error'] = "User not found.";
}

// Redirect to the view-users page
header("Location: view-users.php");
exit;

?>
