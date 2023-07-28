<?php
session_start();
$username=$_SESSION['email'];
$password=$_SESSION['password'];
echo $username;
echo $password;
?>