<?php
session_start();
// logout.php



// Save orders to session before destroying the session
if (isset($_SESSION['orders'])) {
    $_SESSION['saved_orders'] = $_SESSION['orders'];
}

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to homepage or login page
header("Location: index.php");
exit();



?>