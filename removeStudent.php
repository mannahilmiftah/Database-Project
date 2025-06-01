<?php
include('../includes/connect.php');
$id = $_GET["deleteID"];
$sql_delete = "DELETE FROM student WHERE `rollNo` = '$id'";    
if(mysqli_query($con, $sql_delete)){
    header('location:../student.php');
} else{
    echo "ERROR: Hush! Sorry";
}
?>



