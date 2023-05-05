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

    echo $likes;
?>