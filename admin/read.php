<?php

include("db-con.php");
$id = $_GET["id"];

if(!empty($id)){

    $active_status = "UPDATE users_messages SET `status` = 1 WHERE id = '$id'";
    $active_status_run = mysqli_query($con,$active_status);

    if($active_status_run){
        header("Location:user-messages.php");
    }

}

?>