<?php
include('../includes/connect.php');
$id = $_GET["deleteID"];
$sql_delete = "DELETE FROM `stop` WHERE `Name` = '$id'";    
if(mysqli_query($con, $sql_delete)){
    header('location:../stop.php');
} else{
    echo "ERROR: Hush! Sorry";
}
?>



