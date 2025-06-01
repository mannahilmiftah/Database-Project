<?php
include('../includes/connect.php');
$id = $_GET["deleteID"];
$sql_delete = "DELETE FROM bus WHERE `BusNo` = '$id'";    
if(mysqli_query($con, $sql_delete)){
    header('location:../bus.php');
} else{
    echo "ERROR: Hush! Sorry";
}
?>



