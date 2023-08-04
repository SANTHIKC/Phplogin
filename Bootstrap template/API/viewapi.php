<?php
$conn=mysqli_connect("localhost","root","","student");
if(mysqli_connect_error())
{
    die("Error in connection");
}
$empid=3;
$query = mysqli_query($conn,"SELECT * FROM employee WHERE empid='$empid'");
$data=mysqli_fetch_assoc($query);
if($query)
{
     $myarray['data'] =$data ;
}
else
{
    $myarray['message'] = 'failed';
}
echo json_encode($myarray);
?>