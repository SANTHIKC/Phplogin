<?php
$conn=mysqli_connect("localhost","root","","student");
if(mysqli_connect_error())
{
    die("Error in connection");
}
$empid=$_POST['empid'];
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
     $myarray['message'] = 'Added';
}
else
{
    $myarray['message'] = 'failed';
}
echo json_encode($myarray);


?>