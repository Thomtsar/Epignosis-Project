<!DOCTYPE html>
<?php include "functions.php" ?>
<?php session_start(); ?>
<html lang="en">

<head>

    <title>CMS Admin</title>


    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/admin.css">

</head>




<body>
<?php
if(!isset($_SESSION['user_type'])){ ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Access Denied!</strong> Click <a href="signin.php"> <u>here</u> </a> to Sign in.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
    exit();
}
?>