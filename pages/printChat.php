<div style="overflow-y:scroll;max-height:30vh;">

    <?php

    include_once 'pages/printMessage.php';

    $query = "SELECT * FROM messages WHERE receiver = $1 ORDER BY created_at DESC";
    $result = pg_query_params($dbconnession,$query,array($username)) or die("Query failed: " . pg_last_error());
    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        $sender = $line['sender'];
        $message = $line['message_content'];
        $query2 = "SELECT * FROM users WHERE username = $1";
        $result2 = pg_query_params($dbconnession,$query2,array($sender)) or die("Query failed: " . pg_last_error());
        $line2 = pg_fetch_array($result2, null, PGSQL_ASSOC);
        $photo = $line2['photo'];
        $extension = $line2['extensionphoto'];

        echo printMessage($sender, $message, $photo, $extension);
    }
    ?>

</div>
