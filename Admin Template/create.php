<?php

include 'connection.php';
if(isset($_POST['submit'])) 
{
    $name =$_POST['name'];
    $mobile =$_POST['mobile'];
    $email =$_POST['email'];
    $hash=password_hash($_POST['password'],PASSWORD_DEFAULT);
    $filename=$_FILES["photo"]["name"];
    $tempname=$_FILES["photo"]["tmp_name"];
    $folder = "./image/".$filename;
    $image=$filename;

    $uploadOk=1;
    $imageFileType=strtolower(pathinfo($folder,PATHINFO_EXTENSION));
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
    {
        echo "sorry, only JPG,JPEG,PNG & GIF files are allowded.";
        $uploadOk =0;
    }
    if($uploadOk == 0)
    {
        echo "sorry";
    }
    else
    {
        move_uploaded_file($tempname,$folder);
    }
    

    $sql=mysqli_query($conn,"INSERT INTO employee(name,mobile,email,password,photo) VALUES('$name','$mobile','$email','$hash','$image')");
    if($sql)
    {
        echo'<script>alert("Registered Successfullty");window.location.href="loginform.php";</script>';
    }
    else{
        echo'<script>alert("spmthing went wrong")</script>';
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
            
                <form method="post" class="bg-secondary p-3 mt-5 text-light" required enctype="multipart/form-data" >
              <center>  <h1>Employee Form</h1></center>
                    <label>Enter name</label>
                    <input type="text" name="name" class="form-control" placeholder="name" required>
                    <label>enter mobile number</label>
                    <input type="number" name="mobile" class="form-control" placeholder="mobile" required>
                    <label>enter email</label>
                    <input type="email" name="email" class="form-control" placeholder="email" required>
                    <label>enter password</label>
                    <input type="password" name="password" class="form-control" placeholder="password" required>
                   
                    <label >profile photo</label>
                    <input type="file" name="photo" required>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <input type="submit" value="submit" name="submit" class="btn btn-Tertiary mt-2">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>