<?php
$conn=mysqli_connect("localhost","root","","student");
if(mysqli_connect_error())
{
    die("Error in connection");
}
$id=2;
$query = mysqli_query($conn,"SELECT * FROM class");
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