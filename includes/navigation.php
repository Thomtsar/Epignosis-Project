
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Portal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link <?php if(strcmp($_SERVER['REQUEST_URI'],"/epignosis/index.php")==0) echo 'active';?>" href="index.php">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link <?php if(strcmp($_SERVER['REQUEST_URI'],"/epignosis/submit_request.php")==0) echo 'active';?>" href="submit_request.php">Submit Requests</a>
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