<?php
    if ($_SERVER['REQUEST_METHOD'] != 'GET'){
        header("Location: index.php");
    }
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    include "../connection.php";

    $username = $_GET['username'];
    $post_id = $_GET['post_id'];
    $query = "INSERT INTO likes (post_id, user_id) VALUES ($1, $2)";
    $result = pg_query_params($dbconnession, $query, array($post_id, $username)) or die("Query failed: " . pg_last_error());

    $query2 = "SELECT * FROM likes WHERE post_id = $post_id";
    $result2 = pg_query($dbconnession, $query2);
    $likes = pg_num_rows($result2);

    // insert into notification the notify
    $query3 = "SELECT * FROM posts WHERE post_id = $1";
    $result3 = pg_query_params($dbconnession, $query3, array($post_id)) or die("Query failed: " . pg_last_error());
    $row3 = pg_fetch_row($result3);
    $user_from = $username;
    $user_to = $row3[1];
    $notification_content = " liked your post";
    if ($user_from != $user_to){
        $query4 = "INSERT INTO notifications (user_from, user_to, notification_content) VALUES ($1, $2, $3)";
        $result4 = pg_query_params($dbconnession, $query4, array($user_from, $user_to, $notification_content)) or die("Query failed: " . pg_last_error());
    }

    echo $likes -1;
?>