<?php
    include('../includes/connect.php');
    if(isset($_POST['submit'])){
        $noPlate =  $_POST['NoPlate'];
        $busNo = $_POST['busNo'];
        $seats =  $_POST['seats'];
        $sql_insert="INSERT INTO `bus` VALUES ('$noPlate', '$busNo', $seats)";    
        if(mysqli_query($con, $sql_insert)){
            header('location:../bus.php');
        } else {
            echo "ERROR: Hush! Sorry";
        }
    }    
?>


<!DOCTYPE html>
<html lang="en">
   <head>
        <title>Insert Bus</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">        
   </head>
   <body>
        <div class="alert alert-warning" role="alert">
            <a href="../bus.php" class="btn btn-danger btn-sm" id="logout">
            <span class="glyphicon glyphicon-log-out"></span> Back
            </a>        
        </div>
        <center>
            <h1>INSERT NEW BUS</h1>
        </center>
        <div class="container my-5">
            <form method="post">             
                <div class="mb3">
                    <label for="NoPlate">Number Plate:</label>
                    <br>
                    <input type="text" name="NoPlate" id="NoPlate" placeholder="ABC-000">
                </div>            
                <div class="mb3">
                    <label for="busNo">Route No:</label>
                    <br>
                    <input type="text" name="busNo" id="busNo" placeholder="1A">
                </div>            
                <div class="mb3">
                    <label for="seats">Capacity:</label>
                    <br>
                    <input type="number" name="seats" id="seats">
                </div>            
                <button class="btn btn-dark btn-lg my-3" name="submit">Submit</button>
            </form>
        </div>
    </body> 
</html>



