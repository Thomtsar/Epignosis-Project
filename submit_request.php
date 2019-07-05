<?php include "includes/header.php"; ?>
<?php include "db.php"; ?>



<?php include "includes/navigation.php"; ?>

<?php
    if(isset($_POST['submit']))
    {
        $request_date_from = mysqli_real_escape_string($connection,$_POST['request_date_from']);
        $request_date_to = mysqli_real_escape_string($connection,$_POST['request_date_to']);
        $request_reason = mysqli_real_escape_string($connection,$_POST['request_reason']);
        $current_date = date('Y-m-d');
        $query = "INSERT INTO " ;
        $query .= "requests(request_date,request_date_from,request_date_to,request_reason) ";
        $query .= "VALUES ('{$current_date}','{$request_date_from}','{$request_date_to}','{$request_reason}')";

        $insert_request_query = mysqli_query($connection,$query);

        confirmQuery($insert_request_query);

        $request_id = mysqli_insert_id($connection);
        $query = "INSERT INTO apply(user_id,request_id) ";
        $query .= "VALUES('{$_SESSION['user_id']}','{$request_id}')";

        $insert_apply_query = mysqli_query($connection,$query);

        confirmQuery($insert_apply_query);




        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>The request was submitted successfully </strong> Click <a href="index.php"> <u>here</u> </a> to see all the requests.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php
    }



?>


<br>

<form class="col-md-8" method="post" enctype="multipart/form-data">

    <div class="form-group ">
        <label> Date from </label> <span class ="in-line" style="color:red"> * </span>
        <input type="date" class="form-control" name = "request_date_from" required >
    </div>

    <div class="form-group ">
        <label > Date to </label> <span class ="in-line" style="color:red"> * </span>
        <input type="date" class="form-control" name="request_date_to" required >
    </div>

    <div class="form-group ">
        <label > Reason </label> <span class ="in-line" style="color:red"> * </span>
        <textarea class="form-control" name="request_reason" rows="4"></textarea>
    </div>

    <div class ="form_group">
        <input class="btn btn-dark" type = "submit" name="submit" value="Submit">
    </div>
    <br>
    <br>

</form>














<?php include "includes/footer.php" ?>