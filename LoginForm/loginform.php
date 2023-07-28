<?php 
include 'connection.php';
session_start();
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $result=mysqli_query($conn,"SELECT * FROM employee WHERE username='$username'");
    if($result)
    {
        $row =mysqli_fetch_assoc($result);
        $hash =password_verify($password,$row['password']);
        $count=mysqli_num_rows($result);
        if($ount==1 && $hash)
        {
            $_SESSION['empid'] =$row['empid'];
            ?>
            <script>window.location.href="dashboard.php";</script>
            <?php
        }
    }
    else
    {
      echo "invalid password";
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<style>
    .ha 
    {
        border-radius: 1.5rem;
    }
</style>  


</head>
  <body>
    <div class="container" >
        <div class="row">
            <div class="col-4" ></div>
            <div class= "ha col-4" style="margin-top:100px;">
            <form method="POST" class="bg-Info mt-5 text-light p-3">
                <Center><h2 class ="text-Secondary">LOGIN</h2></Center>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  
 <center><button type="submit" class="btn btn-Success " name="submit">Login</button></center> 
</form>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>