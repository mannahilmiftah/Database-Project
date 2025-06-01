<?php
    include('../includes/connect.php');
    $id = $_GET['updateID'];
    $sql = "select * from student where rollNo = '$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['Name']; 
    $rollNo = $row['rollNo'];
    $contact = $row['contactNo'];
    $stop = $row['Stop'];
    $email = $row['email'];
    $password = $row['password'];
    if(isset($_POST['update'])){
        $name = $_POST['name']; 
        $contact = $_POST['contactNo'];
        $stop = $_POST['stop1'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "update student set Name='$name', contactNo='$contact', Stop='$stop', email='$email', password='$password' where rollNo = '$id'";
        $result = mysqli_query($con, $sql);
        if($result){
            //echo "updated";
            header('location:../student.php');
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
        <a href="../student.php" class="btn btn-danger btn-sm" id="logout">
          <span class="glyphicon glyphicon-log-out"></span> Back
        </a>        
    </div>
        <div class="container my-5">
        <center><h1>Update Student</h1></center>

            <form method="post">
                <div class="form-group">            
                    <label>Student Name:</label>
                    <br>
                    <input type="text" name="name" class="Name" autocomplete="off" value=<?php echo $name ?>>
                </div>           
                <div class="form-group">
                    <label>Roll No:</label>
                    <br>
                    <input type="text" name="rollNo" class="rollNo" autocomplete="off"  value=<?php echo $rollNo ?> disabled>
                </div>            
                <div class="form-group">
                    <label>Contact No:</label>
                    <br>
                    <input type="text" name="contactNo" class="contactNo" autocomplete="off" value=<?php echo $contact ?>>
                </div>            
                <br>
                <div class="form-group">
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
                <button class="btn btn-dark btn-lg my-3" type="submit" name="update">Update</button>
            </form>
        </div>
    </body>
</html>