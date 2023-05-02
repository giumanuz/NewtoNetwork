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
    $query = "DELETE FROM likes  where user_id = $1 and post_id = $2";
    $result = pg_query_params($dbconnession, $query, array($username, $post_id)) or die("Query failed: " . pg_last_error());
?>