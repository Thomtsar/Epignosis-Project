<?php

function confirmQuery($result)
{
    global $connection;
    if(!$result)
    {
        die("Query Failed" . mysqli_query($connection,$result));
    }


}

?>