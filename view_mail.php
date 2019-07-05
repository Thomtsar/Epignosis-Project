<?php include "includes/header.php"; ?>
<?php include "db.php"; ?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Portal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link " href="index.php">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link " href="submit_request.php">Submit Requests</a>
        </div>

    </div>

    <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $_SESSION['user_firstname']; ?>
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="signin.php?logout=1">Log out</a>

        </div>
    </div>
</nav>

<br>
<div style='margin-left: 15px'>
<?php

   if(isset($_GET['request_date']))
   {
       $request_date = $_GET['request_date'];
       $request_status = $_GET['request_status'];

       if(strcmp($request_date,"pending") == 0){

           echo "<h4> FROM : Supervisor </h4>";
           echo "<p> Dear employee, your supervisor has $request_status your application <br>";
           echo "submitted on $request_date.</p>";
       }
       else
           echo "<h4> There is no answer yet</h4>";



   }



?>

</div>
















<?php include "includes/footer.php" ?>
