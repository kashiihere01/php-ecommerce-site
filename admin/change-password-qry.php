<?php
session_start();
require_once("./db-con.php");

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['change_password'])) {
    $user_id = $_SESSION['user_id'];  // Assuming you store user ID in session after login
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Fetch the current password from the database
    $qry = "SELECT password FROM users WHERE id = '$user_id'";
    $result = mysqli_query($con, $qry);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $current_password = $row['password'];

        // Verify old password
        if (password_verify($old_password, $current_password)) {
            // Check if new password and confirm password match
            if ($new_password === $confirm_password) {
                // Hash the new password
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                // Update the password in the database
                $update_qry = "UPDATE users SET password = '$hashed_password' WHERE id = '$user_id'";
                if (mysqli_query($con, $update_qry)) {
                    $_SESSION['success'] = "Password changed successfully!";
                } else {
                    $_SESSION['error'] = "Error updating password.";
                }
            } else {
                $_SESSION['error'] = "New password and confirm password do not match.";
            }
        } else {
            $_SESSION['error'] = "Old password is incorrect.";
        }
    } else {
        $_SESSION['error'] = "User not found.";
    }
} else {
    $_SESSION['error'] = "Invalid request.";
}

// Redirect back to the change-password page
header("Location: profile.php");
exit();
?>
