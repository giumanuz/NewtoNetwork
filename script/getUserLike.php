<?php
    if ($_SERVER['REQUEST_METHOD'] != 'GET'){
        header("Location: index.php");
    }
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    include "../connection.php";

    $post_id = $_GET['post_id'];

    $query = "SELECT * FROM likes WHERE post_id = $1::integer ORDER BY RANDOM() LIMIT 1";
    $result = pg_query_params($dbconnession, $query, array($post_id));
    $line = pg_fetch_array($result, NULL, PGSQL_ASSOC);
    if ($line == false){
        echo "";
        exit();
    }
    $userOfLike = $line['user_id'];

    echo $userOfLike;
    
    pg_close($dbconnession);
?>