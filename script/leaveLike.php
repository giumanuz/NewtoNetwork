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
?>