<?php
session_start();
UNSET($_SESSION['empid']);
header("location:loginform.php");
?>