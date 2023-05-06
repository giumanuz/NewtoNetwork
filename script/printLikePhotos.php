<?php

    include_once "printPhoto.php";

    if ($_SERVER['REQUEST_METHOD'] != 'GET'){
        header("Location: index.php");
    }
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    include "../connection.php";

    $post_id = $_GET['post_id'];
    $query = "SELECT * FROM likes WHERE post_id = $1::integer ORDER BY RANDOM() LIMIT 3";
    $result = pg_query_params($dbconnession, $query, array($post_id));
    $likes = array();
    while($line = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
        $user_id = $line['user_id'];
        $query = "SELECT * FROM users WHERE username = $1";
        $result2 = pg_query_params($dbconnession, $query, array($user_id));
        $line2 = pg_fetch_array($result2, NULL, PGSQL_ASSOC);
        $photo = $line2['photo'];
        $extension = $line2['extensionphoto'];
        $likes[] = array($photo, $extension);
    }

    echo printPhotosLike($likes);
?>