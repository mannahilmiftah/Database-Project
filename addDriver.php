<?php
    include('../includes/connect.php');
    if(isset($_POST['submit'])){
        $name =  $_POST['name'];
        $contact =  $_POST['contactNo'];
        $cnic = $_POST['cnic'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $busNo = $_POST['bus1'];
        $sql_insert="INSERT INTO `driver` (`Name`, contactNo, cnic, email, `password`, busNo) VALUES ('$name',$contact,'$cnic','$email','$password','$busNo')";    
        if(mysqli_query($con, $sql_insert)){
            header('location:../driver.php');
        } else{
            echo "ERROR: Hush! Sorry";
        }
    }    
?>

<!DOCTYPE html>
<html lang="en">
   <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
        <title>Insert Driver</title>
   </head>
   <body>
        <div class="alert alert-warning" role="alert">
            <a href="../driver.php" class="btn btn-danger btn-sm" id="logout">
            <span class="glyphicon glyphicon-log-out"></span> Back
            </a>        
        </div>
        <center>
            <h1>INSERT NEW DRIVER</h1>
        </center>
        <div class="container my-5">
            <form method="post">             
                <div class="mb-3">
                    <label class="form-label" for="Name">Driver Name:</label>
                    <br>
                    <input type="text" name="name" id="name">
                </div>                       
                <div class="mb-3">
                    <label class="form-label" for="contactNo">Contact No:</label>
                    <br>
                    <input type="text" name="contactNo" id="contactNo">
                </div>            
                <div class="mb-3">
                    <label class="form-label" for="cnic">CNIC:</label>
                    <br>
                    <input type="text" name="cnic" id="cnic">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="emailAddress">Email Address:</label>
                    <br>
                    <input type="email" name="email" id="emailAddress">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Password:</label>
                    <br>
                    <input type="password" name="password" id="password">
                </div>
                <div class="mb-3">
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



