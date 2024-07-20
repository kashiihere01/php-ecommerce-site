<?php
$servername = "localhost";
$database = "u512319048_Deals";
$username = "u512319048_Deals_24";
$password = "Motii@8900";
 
// Create connection
 
$con = mysqli_connect($servername, $username, $password, $database);
 
// Check connection
 
if (!$con) {
 
    die("Connection failed: " . mysqli_connect_error());
 
}
mysqli_close($con);
?>