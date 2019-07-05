
<?php include "includes/header.php"; ?>
<?php include "../db.php" ?>

<?php include "includes/navigation.php"; ?>


<?php

    $query = "SELECT requests.request_id, request_date,users.user_id,user_firstname,user_lastname ";
    $query .="FROM requests,users,apply ";
    $query .="WHERE request_status = 'pending' and requests.request_id = apply.request_id and users.user_id = apply.user_id";
    $request_query = mysqli_query($connection,$query);

    if(!$request_query)
    {
        die("Query Failed select" . mysqli_query($connection,$request_query));
    }
?>


    <table class="table table-hover">
        <thead>
        <tr>

            <th scope="col">Request id</th>
            <th scope="col">Date</th>
            <th scope="col">Employee</th>


        </tr>
        </thead>

        <tbody>
        <?php
        while($row = mysqli_fetch_assoc($request_query))
        {
            $request_id = $row['request_id'];
            $user_id = $row['user_id'];
            $request_date = $row['request_date'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];

            echo "<tr>";
            echo "<th scope='row'><a href='view_mail.php?request_id={$request_id}&user_id={$user_id}'></a>$request_id</th>";
            echo "<th>$request_date</th>";
            echo "<th>$user_firstname $user_lastname</th>";
            echo "</tr>";
        }
        ?>

        </tbody>
    </table>



















<?php include "includes/footer.php";?>
