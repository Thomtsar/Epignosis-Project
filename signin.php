<!DOCTYPE html>
<?php include "includes/functions.php";?>
<?php session_start(); ?>

<html lang="en">

<head>

    <title>Login</title>


    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/custom.css">

</head>
<?php include "db.php"; ?>

<?php


if(isset($_GET['logout']))
{
    unset($_SESSION['user_firstname'] );
    unset($_SESSION['user_id']);
    unset($_SESSION['user_type']);

}



if(isset($_POST['create_user']))
{
    $user_email = mysqli_real_escape_string($connection,$_POST['user_email']);
    $user_password = mysqli_real_escape_string($connection,$_POST['user_password']);

    $user_password = crypt($user_password, '$2a$16$thisisanexampleforthis$');

    $query = "SELECT * FROM users WHERE ";
    $query .= "user_email ='{$user_email}' and user_password='{$user_password}' ";

    $login_query = mysqli_query($connection,$query);


    confirmQuery($login_query);

    $check_query = mysqli_num_rows($login_query);
    if($check_query == 1){
        $row = mysqli_fetch_assoc($login_query);



         $_SESSION['user_firstname'] = $row['user_firstname'];
         $_SESSION['user_id'] = $row['user_id'];
         $_SESSION['user_type'] = $row['user_type'];

         if(strcmp($_SESSION['user_type'],"admin")==0)
             header("Location: admin/index.php");
         else
            header("Location: index.php");


    }?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>E-mail or password is incorrect. Please try again or contact the administrator</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

<?php
}
?>
<body>

<div class="card mx-auto" style="width: 30%;">

    <div class="card-body">

        <form method="post" enctype="multipart/form-data">
        <h3 class="card-title text-center">Sign in</h3>


        <div class="form-group card-text">
            <label > E-mail </label> <span class ="in-line" style="color:red"> * </span>
            <input type="email" class="form-control" name="user_email" required>
        </div>

        <div class="form-group ">
            <label > Password </label> <span class ="in-line" style="color:red"> * </span>
            <input type="password" class="form-control" name="user_password" required>
        </div>

        <div class ="form_group">
            <input class="btn btn-primary" type = "submit" name="create_user" value="Submit">
        </div>

        </form>
    </div>
</div>







<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>


</html>