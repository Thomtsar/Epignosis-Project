<?php include "includes/header.php"; ?>
<?php include "../db.php";?>


<?php include "includes/navigation.php"; ?>

<?php
if(isset($_POST['create_user']))
{

    $user_firstname = mysqli_real_escape_string($connection,$_POST['user_firstname']);
    $user_lastname = mysqli_real_escape_string($connection,$_POST['user_lastname']);
    $user_email = mysqli_real_escape_string($connection,$_POST['user_email']);
    $user_password = mysqli_real_escape_string($connection,$_POST['user_password']);
    $user_password_test = mysqli_real_escape_string($connection,$_POST['user_password_test']);
    $user_type = mysqli_real_escape_string($connection,$_POST['user_type']);

    $query = "SELECT * FROM users WHERE user_email='$user_email}' ";
    $email_query = mysqli_query($connection,$query);
    confirmQuery($email_query);

    $email_test = mysqli_num_rows($email_query);


    if(strcmp($user_password,$user_password_test)!=0 )
    { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>The passwords are not matching</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>


    <?php
    }
    else if ($email_test>0)
    {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>There is another user with this email already</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>

    <?php }
    else
    {

        $user_password = crypt($user_password, '$2a$16$thisisanexampleforthis$');

        $query = "INSERT INTO users(user_firstname,user_lastname,user_email,user_password,user_type) ";
        $query .= "VALUES ('{$user_firstname}','{$user_lastname}','{$user_email}','{$user_password}','{$user_type}')";
        $insert_query = mysqli_query($connection,$query);
        confirmQuery($insert_query);
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>The account was created successfully! </strong> Click <a href="index.php"> <u>here</u> </a> to see all the users.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div> <?php
    }


}

?>

<form class="col-md-8" method="post" enctype="multipart/form-data">

    <div class="form-group ">
        <label> First Name </label>
        <input type="text" class="form-control" name = "user_firstname" >
    </div>

    <div class="form-group ">
        <label > Last Name </label>
        <input type="text" class="form-control" name="user_lastname" >
    </div>


    <div class="form-group ">
        <label > E-mail </label> <span class ="in-line" style="color:red"> * </span>
        <input type="email" class="form-control" name="user_email" required>
    </div>

    <div class="form-group ">
        <label > Password </label> <span class ="in-line" style="color:red"> * </span>
        <input type="password" class="form-control" name="user_password" required>
    </div>

    <div class="form-group ">
        <label > Re-enter Password </label> <span class ="in-line" style="color:red"> * </span>
        <input type="password" class="form-control" name="user_password_test" required>
    </div>

    <div class="form-group ">
    <label >User Type</label><span class ="in-line" style="color:red"> * </span>
    <select name="user_type" required>
        <option>employee</option>
        <option>admin</option>
    </select>
    </div>

    <div class ="form_group">
        <input class="btn btn-primary" type = "submit" name="create_user" value="Create">
    </div>
    <br>
    <br>

</form>








<?php include "includes/footer.php";?>