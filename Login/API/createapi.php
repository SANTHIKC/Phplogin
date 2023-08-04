<?php
$conn=mysqli_connect("localhost","root","","student");
if(mysqli_connect_error())
{
    die("Error in connection");
}
$id=$_POST['id'];
$name=$_POST['name'];
$age=$_POST['age'];
$email=$_POST['email'];
$password=$_POST['password'];
$dob=$_POST['dob'];
$query = mysqli_query($conn,"INSERT INTO class(name,age,email,password,dob) VALUES('$name','$age','$email','$password','$dob')");
if($query)
{
     $myarray['message'] = 'Added';
}
else
{
    $myarray['message'] = 'failed';
}
echo json_encode($myarray);

?>