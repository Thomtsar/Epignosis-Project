

<?php


    $query = "SELECT * FROM users";
    $users_query = mysqli_query($connection,$query);
    confirmQuery($users_query);

?>

<table class="table table-hover">
    <thead>
    <tr>

        <th scope="col">User First Name</th>
        <th scope="col">User Last Name</th>
        <th scope="col">User E-mail</th>
        <th scope="col">User Type</th>


    </tr>
    </thead>

    <tbody>
    <?php
    while($row = mysqli_fetch_assoc($users_query))
    {
        $user_id = $row['user_id'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_type = $row['user_type'];

        echo "<tr>";
        echo "<th scope='row'><a href='edit_user.php?user_id={$user_id}'></a>$user_firstname</th>";
        echo "<th>$user_lastname</th>";
        echo "<th>$user_email</th>";
        echo "<th>$user_type</th>";
        echo "</tr>";
    }
    ?>

    </tbody>
</table>
