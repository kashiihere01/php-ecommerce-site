<?php

include("db-con.php");
$id = $_GET["id"];

if(!empty($id)){

    $active_status = "UPDATE orders SET `status` = 'on_the_way' WHERE id = '$id'";
    $active_status_run = mysqli_query($con,$active_status);

    if($active_status_run){
        header("Location:orders.php");
    }

}

?>