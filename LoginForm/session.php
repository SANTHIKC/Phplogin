<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //set session variables
    $_SESSION['username']="anu@gmail.com";
    $_SESSION['password']="anu@123";
    echo "Session variable are set.";
    ?>
</body>
</html>