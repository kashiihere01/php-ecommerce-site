<?php

require_once("./db-con.php");

$get_product_id = $_GET['id'];

$product_delete_qry = "DELETE FROM users WHERE id='$get_product_id'";

if (mysqli_query($con, $product_delete_qry)) {
    session_start();
    $_SESSION['success'] = "Operation Performed Successfully...!";
    header("Location:view-users.php");
}
