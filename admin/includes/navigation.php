<?php
$query = "SELECT * FROM requests WHERE request_status = 'pending'";
$requests_query = mysqli_query($connection,$query);
confirmQuery($requests_query);
$number_of_mails = mysqli_num_rows($requests_query);



?>
<ul class="nav nav-tabs flex-column ">
    <li class="nav-item">
        <a class="nav-link <?php if(strcmp($_SERVER['REQUEST_URI'],"/epignosis/admin/index.php")==0) echo 'active';?>" href="index.php" >Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php if(strcmp($_SERVER['REQUEST_URI'],"/epignosis/admin/create_user.php")==0) echo 'active';?>" href="create_user.php">Create User</a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php if(strcmp($_SERVER['REQUEST_URI'],"/epignosis/admin/mails.php")==0) echo 'active';?>" href="mails.php">Mail |<?php echo $number_of_mails?>|</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">User</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="../signin.php?logout=1">Log out</a>
        </div>
    </li>

</ul>
<div class="after-nav">