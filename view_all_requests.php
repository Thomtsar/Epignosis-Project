


<?php

    $user_id = $_SESSION['user_id'];
    $query = "SELECT request_date, request_date_from, request_date_to, request_status ";
    $query .= "FROM requests, apply ";
    $query .= "WHERE user_id = '{$user_id}' and requests.request_id = apply.request_id";
    $requests_query = mysqli_query($connection,$query);

    confirmQuery($requests_query);


?>

<br>
<a style="margin-left: 15px" class="btn btn-dark" href="submit_request.php" role="button">Submit Request</a>


<br>
<br>


<table class="table table-hover">
    <thead>
    <tr>

        <th scope="col">Date submitted</th>
        <th scope="col">Dates Requested</th>
        <th scope="col">Status</th>

    </tr>
    </thead>

    <tbody>
    <?php
    while($row = mysqli_fetch_assoc($requests_query))
    {

        $request_date = $row['request_date'];
        $request_date_from = $row['request_date_from'];
        $request_date_to = $row['request_date_to'];
        $request_status = $row['request_status'];

        echo "<tr>";
        echo "<th scope='row'><a href='view_mail.php?request_date={$request_date}&request_status={$request_status}'></a>$request_date</th>";
        echo "<th>$request_date_from / $request_date_to </th>";
        echo "<th>$request_status</th>";
        echo "</tr>";
    }
    ?>

    </tbody>
</table>



<script src="js/my.js"></script>