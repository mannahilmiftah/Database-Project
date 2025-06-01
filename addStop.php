<?php
    include('../includes/connect.php');
    if(isset($_POST['submit'])){
        $name =  $_POST['name'];
        $busNo = $_POST['bus1'];
        $time =  $_POST['time'];
        $sql_insert="INSERT INTO `stop` VALUES ('$name', '$time', '$busNo')";    
        if(mysqli_query($con, $sql_insert)){
            header('location:../stop.php');
        } else{
            echo "ERROR: Hush! Sorry";
        }
    }    
?>

<!DOCTYPE html>
<html lang="en">
   <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
        <title>Insert Stop</title>
   </head>
   <body>
        <div class="alert alert-warning" role="alert">
            <a href="../stop.php" class="btn btn-danger btn-sm" id="logout">
            <span class="glyphicon glyphicon-log-out"></span> Back
            </a>        
        </div>
        <center>
            <h1>INSERT NEW STOP</h1>
        </center>
        <div class="container">
            <form action="" method="post">             
            <div class="mb3">
                <label class="form-label" for="name">Stop Name:</label>
                <br>
                <input type="text" name="name" id="name">
            </div>              
            <div class="mb3">
                <label class="form-label" for="time">Pickup Time:</label>
                <br>
                <input type="text" name="time" id="time" placeholder="7.10">
            </div>  
            <br>           
            <div class="mb3">
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
            <button class="btn btn-dark btn-lg my-3" name="submit">Submit</button>
            </form>
        </div>
    </body> 
</html>



