<?php 
session_start();
$conn=mysqli_connect("localhost","root","","student");
if(mysqli_connect_errno())
{
    die("Error in connection");
}
    $username="anu@gmail.com";
    
    $result=mysqli_query($conn,"SELECT * FROM employee WHERE email='$username'");
    if($result)
    {
    
        $row =mysqli_fetch_assoc($result);
        $count=mysqli_num_rows($result);
        if($count==1)
        {

            $_SESSION['empid'] =$row['empid'];            
            $myarray['message'] = 'success';
        }
        else 
        {
            $myarray['message'] ='failed';
        }
    }
echo json_encode($myarray);

?>
