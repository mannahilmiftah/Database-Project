<?php
    $con = mysqli_connect('localhost','root','','project_db');
    if(!$con){
         die("connection failed".mysqli_connect_error());}
?>