<?php
    include('../includes/connect.php');
    $id = $_GET["deleteID"];
    $sql_delete = "DELETE FROM driver WHERE `id` = '$id'";    
    if(mysqli_query($con, $sql_delete)){
        header('location:../driver.php');
    } else{
        echo "ERROR: Hush! Sorry";
    }
?>



