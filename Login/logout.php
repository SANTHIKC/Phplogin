<?php
session_start();
UNSET($_SESSION['id']);
header("location:loginform.php");
?>