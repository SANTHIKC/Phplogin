<?php
session_start();
include 'connection.php';
$code =$_SESSION['empid'];
echo $code;
$query=mysqli_query($conn,"SELECT * FROM employee WHERE empid='$code'");
$data=mysqli_fetch_assoc($query);
if(isset($_POST['update']))
{
    $name =$_POST['name'];
    $mobile =$_POST['mobile'];
    $email =$_POST['email'];

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
    
    $sql =mysqli_query($conn,"UPDATE employee SET name='$name', mobile='$mobile',email='$email',photo='$image' WHERE empid='$code'");
    if($sql)
    {
        echo'<script>alert("update successfully");window.location.href="viewprofile.php";</script>';
    }
    else
    {
        echo '<script>alert("somthing error");</script>';
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
            
                <form method="post" class="bg-dark p-3 mt-5 text-light" enctype="multipart/form-data">
                <h1>Registration Form</h1>
            
                    <input type="text" name="name" class="form-control" value="<?php echo $data['name'];?>" >
                    <input type="text" name="mobile" class="form-control" value="<?php echo $data['mobile'];?> ">
                    <input type="email" name="email" class="form-control" value="<?php echo $data['email'];?>">
            
                    <input type="file" name ="photo">

                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                            <input type="submit" value="update" name="update" class="btn btn-primary mt-2">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>