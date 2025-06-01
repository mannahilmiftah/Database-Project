<?php
    include('../includes/connect.php');
    $id = $_GET['updateID'];
    $sql = "select * from driver where id = '$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['Name']; 
    $id = $row['id'];
    $contact = $row['contactNo'];
    $cnic = $row['cnic'];
    $email = $row['email'];
    $password = $row['password'];
    $busno = $row['busNo'];
    if(isset($_POST['update'])){
        $name = $_POST['name']; 
        $contact = $_POST['contactNo'];
        $cnic = $_POST['cnic'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $busno = $_POST['bus1'];
        $sql = "update driver set Name='$name', contactNo='$contact', cnic='$cnic', email='$email', password='$password', busNo='$busno' where id = '$id'";
        $result = mysqli_query($con, $sql);
        if($result){
            //echo "updated";
            header('location:../driver.php');
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
        <a href="../driver.php" class="btn btn-danger btn-sm" id="logout">
          <span class="glyphicon glyphicon-log-out"></span> Back
        </a>        
    </div>
        <div class="container my-5">
        <center><h1>Update Driver</h1></center>
            <form method="post">
                <div class="form-group">            
                    <label>Name:</label>
                    <br>
                    <input type="text" name="name" class="Name" autocomplete="off" value=<?php echo $name ?>>
                </div>     
                <div class="form-group">
                    <label>Contact No:</label>
                    <br>
                    <input type="text" name="contactNo" class="contactNo" autocomplete="off" value=<?php echo $contact ?>>
                </div>            
                <div class="form-group">
                    <label>CNIC:</label>
                    <br>
                    <input type="number" name="cnic" class="cnic" autocomplete="off" value=<?php echo $cnic ?>>
                </div>
                <div class="form-group">
                    <label>Email Address:</label>
                    <br>
                    <input type="email" name="email" class="emailAddress" autocomplete="off" value=<?php echo $email ?>>
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <br>
                    <input type="password" name="password" class="password" autocomplete="off" value=<?php echo $password ?>>
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