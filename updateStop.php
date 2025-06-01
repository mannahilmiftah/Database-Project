<?php
    include('../includes/connect.php');
    $id = $_GET['updateID'];
    $sql = "select * from stop where Name = '$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['Name']; 
    $busNo = $row['BusNo'];
    $time = $row['time'];
    if(isset($_POST['update'])){
        $busNo = $_POST['bus1'];
        $time = $_POST['time'];
        $sql = "update stop set BusNo='$busNo', time='$time' where Name = '$id'";
        $result = mysqli_query($con, $sql);
        if($result){
            //echo "updated";
            header('location:../stop.php');
        }else{
            die(mysqli_error($con));
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">   
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
        <title>Update Student</title>
    </head>
    <body>
    <div class="alert alert-warning" role="alert">
        <a href="../stop.php" class="btn btn-danger btn-sm" id="logout">
          <span class="glyphicon glyphicon-log-out"></span> Back
        </a>        
    </div>
        <div class="container my-5">
        <center><h1>Update Stop</h1></center>

            <form method="post">
                <div class="form-group">            
                    <label>Stop Name:</label>
                    <br>
                    <input type="text" name="name" class="Name" autocomplete="off" value=<?php echo $name ?> disabled>
                </div>           
                <div class="form-group">
                    <label>Pickup Time:</label>
                    <br>
                    <input type="text" name="time" class="time" autocomplete="off"  value=<?php echo $time ?>>
                </div>        
                <br>    
                <div class="form-group">
                <label class = "form-label">Route No</label>
                <select name="bus1" id="bus1" required>
                        <option disabled selected>select</option>
                        <?php
                            $result = mysqli_query($con, "SELECT * from `bus`");
                            while($data = mysqli_fetch_array($result)){
                                echo "<option value='".$data['BusNo']."'>".$data['BusNo']."</option>";
                            }

                        ?>
            
                    </select>
                </div>            
                <button class="btn btn-dark btn-lg my-3" type="submit" name="update">Update</button>
            </form>
        </div>
    </body>
</html>