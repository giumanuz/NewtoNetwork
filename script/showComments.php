<?php

    include_once "convertTimeFromTimestampToTime.php";



    function costructComment($text, $photoProfile, $extensionProfile, $username, $time){
        $comment = " 
                    <div class='comment'>
                    <div class='profile-photo'>
                        <img src='data:image/". $extensionProfile . ";base64," . $photoProfile . "' alt='Binary Image'>
                    </div>
                    <div class='notification-body'>
                        <b style='margin-right:0.5rem;'> ". $username . " </b>  ". $text . "
                        <small class='text-muted'> ". $time . " ago</small>
                    </div>
                </div>

                <hr>
        ";
        return $comment;
    }

    if ($_SERVER['REQUEST_METHOD'] != 'GET'){
        header("Location: index.php");
    }

    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }

    include "../connection.php";

    $post_id = $_GET['post_id'];

    $send='';
    
    $query = "SELECT * FROM comments WHERE post_id = $1 ORDER BY comment_id DESC";
        $result = pg_query_params($dbconnession, $query, array($post_id)) or die("Query failed: " . pg_last_error());
        while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            $text = $line['comment_content'];
            $user_id = $line['user_id'];
            $query2 = "SELECT * FROM users WHERE username = $1";
            $result2 = pg_query_params($dbconnession, $query2, array($user_id)) or die("Query failed: " . pg_last_error());
            $line2 = pg_fetch_array($result2, null, PGSQL_ASSOC);
            $photoProfile = $line2['photo'];
            $extensionProfile = $line2['extensionphoto'];
            $time = $line['created_at'];
            $time = convertTime($time);
            $send = $send . costructComment($text, $photoProfile, $extensionProfile, $user_id, $time);

        }

    
    echo $send;

?>