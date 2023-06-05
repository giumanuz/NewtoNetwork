<h4 style="margin-top:1rem;">Requests</h4>
<div class="friend-requests" style="overflow-y:scroll;max-height:30vh;border-radius:var(--border-radius);box-shadow: 0 0 1rem var(--color-primary);">

    <?php
    include_once 'pages/printRequest.php';

    $query = "SELECT * FROM friend_requests WHERE receiver = $1";
    $result = pg_query_params($dbconnession, $query, array($_SESSION['username']));
    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        $sender = $line['sender'];
        $query = "SELECT * FROM users WHERE username = $1";
        $result2 = pg_query_params($dbconnession, $query, array($sender));
        $line = pg_fetch_array($result2, null, PGSQL_ASSOC);
        $photo = $line['photo'];
        $extension = $line['extensionphoto'];
        $name = $line['first_name'];
        $surname = $line['surname'];
        $usernameRequest = $line['username'];
        $usernameUser = $_SESSION['username'];
        // query to find the numbers of mutual friends
        $query3 =  "SELECT f1.friend_user_id
                    FROM friends AS f1
                    JOIN friends AS f2 ON f1.friend_user_id = f2.friend_user_id
                    WHERE f1.user_id = $1
                    AND f2.user_id = $2
                    AND f1.friend_user_id <> $1
                    GROUP BY f1.friend_user_id ";
        $result3 = pg_query_params($dbconnession, $query3, array($usernameRequest, $usernameUser));
        $line3 = pg_fetch_array($result3, null, PGSQL_ASSOC);
        $mutualFriends = pg_num_rows($result3);
        echo printRequest($name, $surname, $photo, $extension, $usernameRequest, $mutualFriends);
    }
    ?>

</div>