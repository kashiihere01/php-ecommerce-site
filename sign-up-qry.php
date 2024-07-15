<?php
require_once("./includes/db-con.php");

if ($_SERVER['REQUEST_METHOD'] === "POST" && $_POST['signup'] === "signup") {

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);


    $password  = $_POST['password'];
    if ($email == "" || $password == "") {
        $_SESSION['error'] = "All feilds are requireds...!";
        header("Location:register.php");
        exit;
    }
    // verify username should be unique
    $select_q = "SELECT * FROM customers WHERE name='$name' ";
    $result = mysqli_query($con, $select_q);

    if (mysqli_num_rows($result)  === 1) {
        $_SESSION['invalid'] = "Invalid Credentials...!";
        header("Location:register.php");
        exit;
    }
    $select_e = "SELECT * FROM customers WHERE email='$email' ";
    $result = mysqli_query($con, $select_e);

    if (mysqli_num_rows($result)  === 1) {
        $_SESSION['invalid'] = "User Already exists...!";
        header("Location:register.php");
        exit;
    }
    // insert
    $sql = "INSERT INTO customers (`name`, `email`, `password` , `city`,`mobile`) 
    VALUES('$name', '$email', '$password' , '$city', '$city') ";

    if (mysqli_query($con, $sql)) {
      
       
    
            header("Location:index.php");
    
    }
}
