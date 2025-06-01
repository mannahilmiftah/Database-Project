<?php
    include('../includes/connect.php');
    if(isset($_POST['submit'])){
        $namee =  $_POST['name'];
        $rolll = $_POST['rollNo'];
        $contactt =  $_POST['contactNo'];
        $stopp = $_POST['stop1'];
        $emaill = $_POST['email'];
        $passwordd = $_POST['password'];
        $sql_insert="INSERT INTO `student` VALUES ('$rolll','$namee',$contactt,'$stopp','$emaill','$passwordd')";    
        if(mysqli_query($con, $sql_insert)){
            header('location:../student.php');
        } else{
            echo "ERROR: Hush! Sorry";
        }
    }
    
?>


<!DOCTYPE html>
<html lang="en">
   <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
        <title>Insert Student</title>
   </head>
   <body>   
        <div class="alert alert-warning" role="alert">
            <a href="../student.php" class="btn btn-danger btn-sm" id="logout">
            <span class="glyphicon glyphicon-log-out"></span> Back
            </a>        
        </div>
        <center>    
            <h1 class="my-3">INSERT NEW STUDENT</h1>
        </center> 
        <div class="container my-5">
            <form method="post">
                <div class="mb3">            
                    <label class="form-label" for="Name">Student Name:</label>
                    <br>
                    <input type="text" name="name" id="Name">
                </div>           
                <div class="mb3">
                    <label class="form-label"  for="rollNo">Roll No:</label>
                    <br>
                    <input type="text" name="rollNo" id="rollNo" placeholder="19K-1234">
                </div>            
                <div class="mb3">
                    <label class="form-label"  for="contactNo">Contact No:</label>
                    <br>
                    <input type="number" name="contactNo" id="contactNo" autocomplete="off">
                </div>            
                <br>
                <div class="mb3">
                    <label class = "form-label" for="stop">Stop Name</label>
                    <select name="stop1" id="stop1" required>
                        <option disabled selected>select</option>
                        <?php
                            $result = mysqli_query($con, "SELECT * from `stop`");
                            while($data = mysqli_fetch_array($result)){
                                echo "<option value='".$data['Name']."'>".$data['Name']."</option>";
                            }

                        ?>
            
                    </select>
                </div>
                <div class="mb3">
                    <label class="form-label"  for="emailAddress">Email Address:</label>
                    <br>
                    <input type="email" name="email" id="emailAddress" placeholder="K201234@nu.edu.pk" autocomplete="off">
                </div>
                <div class="mb3">
                    <label class="form-label"  for="password">Password:</label>
                    <br>
                    <input type="password" name="password" id="password">
                </div>
                <button class="btn btn-dark btn-lg my-3" name="submit">Submit</button>
            </form>
        </div>        
    </body> 
</html>



