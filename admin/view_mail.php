<?php include "includes/header.php"; ?>
<?php include "../db.php" ?>

<?php
$query = "SELECT * FROM requests WHERE request_status = 'pending'";
$requests_query = mysqli_query($connection,$query);
confirmQuery($requests_query);
$number_of_mails = mysqli_num_rows($requests_query);



?>
<ul class="nav nav-tabs flex-column ">
    <li class="nav-item">
        <a class="nav-link active" href="index.php">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="create_user.php">Create User</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="mails.php">Mail |<?php echo $number_of_mails?>|</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">User</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="../signin.php?logout=1">Log out</a>
        </div>
    </li>

</ul>
<div class="after-nav">


<?php
if(isset($_GET['approve']))
{
    $approve = $_GET['approve'];
    $request_id = $_GET['request_id'];
    $message = "rejected";
    if($approve == 1 )
        $message = "approved";

    $query = "UPDATE requests SET ";
    $query .="request_status = '{$message}' WHERE request_id='{$request_id}'";
    $update_query = mysqli_query($connection,$query);
    confirmQuery($update_query);

    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>The request was <?php echo $message;?> successfully! </strong> Click <a href="mails.php"> <u>here</u> </a> to see all requests.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> <?php

    exit();
}


if(isset($_GET['request_id'])){

    $user_id = $_GET['user_id'];
    $request_id = $_GET['request_id'];

    $query = "SELECT * FROM users ";
    $query .= "WHERE user_id = '{$user_id}'";
    $user_query = mysqli_query($connection,$query);
    confirmQuery($user_query);


    while($row = mysqli_fetch_assoc($user_query)) {
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];

    }


    $query = "SELECT * FROM requests ";
    $query .= "WHERE request_id = '{$request_id}'";
    $request_query = mysqli_query($connection,$query);
    confirmQuery($request_query);

    while($row = mysqli_fetch_assoc($request_query)) {
        $request_date = $row['request_date'];
        $request_date_from = $row['request_date_from'];
        $request_date_to = $row['request_date_to'];
        $request_status = $row['request_status'];
        $request_reason = $row['request_reason'];

    }
}


?>


<h4> Mail From: <?php echo $user_email;?> </h4>

<p>
    Dear supervisor, employee <?php echo $user_firstname." ".$user_lastname;?>  requested for some time off, starting on<br>
    <?php echo $request_date_from;?>  and ending on <?php echo $request_date_from;?> , stating the reason:<br>
    <?php echo $request_reason;?><br>
    Click on one of the below links to approve or reject the application: <p><br>
        <span>
        <a href="view_mail.php?approve=1&request_id=<?php echo $request_id ?>" class="btn btn-success" tabindex="-1" role="button" ">Approve</a>
        <a href="view_mail.php?approve=0&request_id=<?php echo $request_id ?>" class="btn btn-danger" tabindex="-1" role="button">Reject</a>
        </span>
        <?php include "includes/footer.php"; ?>
