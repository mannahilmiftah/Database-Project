<?php
    include('../includes/connect.php');
    $id = $_GET['updateID'];
    $sql = "select * from bus where BusNo = '$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $NoPlate = $row['NoPlate'];
    $BusNo = $row['BusNo'];
    $Seats = $row['Seats'];
    if(isset($_POST['update'])){
        $NoPlate =  $_POST['NoPlate'];
        $Seats = $_POST['Seats'];
        $sql = "update `bus` set NoPlate='$NoPlate', Seats=$Seats where BusNo='$id'";
        $result = mysqli_query($con, $sql);
        if($result){
           header('location:../bus.php');
        }
        else{
            die(mysqli_error($con));
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
   <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
        <title>Update Bus</title>
   </head>
   <body>
   <div class="alert alert-warning" role="alert">
        <a href="../bus.php" class="btn btn-danger btn-sm" id="logout">
          <span class="glyphicon glyphicon-log-out"></span> Back
        </a>        
    </div>
        <div class="container my-5">
        <center><h1>Update Bus</h1></center>
            <form method="post">          
                <div class="form-group">
                    <label>Number Plate:</label>
                    <br>
                    <input class="form-control" autocomplete="off" type="text" name="NoPlate" id="NoPlate" value=<?php echo $NoPlate?>>
                </div>            
                <div class="form-group">
                    <label>Route No:</label>
                    <br>
                    <input class="form-control" autocomplete="off" type="text" name="BusNo" id="busNo" value=<?php echo $id ?> disabled>
                </div>            
                <div class="form-group">
                    <label>Capacity:</label>
                    <br>
                    <input class="form-control" autocomplete="off" type="number" name="Seats" id="Seats" value=<?php echo $Seats ?>>
                </div>            
                <button type="submit" class="btn btn-dark btn-lg my-3" name="update">Update</button>
                
            </form>
        </div>
    </body> 
</html>