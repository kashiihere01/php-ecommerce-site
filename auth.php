<?php
session_start();
require_once "./includes/db-con.php";

if (!isset($_SESSION['login'])  || $_SESSION['login'] == false) {
    header("location: login.php");
} else {
    $sel_sql = "SELECT * FROM customers WHERE id='$_SESSION[user_id]' ";
    $result = mysqli_query($con, $sel_sql);

    $row = mysqli_fetch_assoc($result);

    $_SESSION['name'] = $row['name'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['mobile'] = $row['mobile'];
 
    $_SESSION['city'] = $row['city'];

}
