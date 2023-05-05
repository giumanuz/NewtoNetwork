<?php
    if ($_SERVER['REQUEST_METHOD'] != 'GET'){
        header("Location: index.php");
    }
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    include "../connection.php";

    $post_id = $_GET['post_id'];

    $query = "SELECT * FROM likes WHERE post_id = '$post_id'";
    $result = pg_query($dbconnession, $query);
    $likes = pg_num_rows($result);

    echo $likes;

    pg_close($dbconnession);
?>