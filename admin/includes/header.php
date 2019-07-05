<!DOCTYPE html>
<?php include "functions.php" ?>
<?php session_start(); ?>
<html lang="en">

<head>

    <title>CMS Admin</title>


    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <script src="js/my.js"></script>
</head>

<body>

<?php

if(!isset($_SESSION['user_type']))
{
    header("Location: ../signin.php");
}

if(strcmp($_SESSION['user_type'],"admin") != 0)
    header("Location: ../index.php");
?>

<header>

    <p class="align-middle">Welcome Back <?php echo $_SESSION['user_firstname']; ?></p>


</header>
