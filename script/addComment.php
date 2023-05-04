<?php
    if ($_SERVER['REQUEST_METHOD'] != 'POST'){
        header("Location: index.php");
    }
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    include "../connection.php";

    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    $username = $data['username'];
    $id_post = $data['id_post'];
    $text = $data['text'];

    $query = "INSERT INTO comments (post_id, user_id, comment_content) VALUES ($1, $2, $3)";
    $result = pg_query_params($dbconnession, $query, array($id_post, $username, $text)) or die("Query failed: " . pg_last_error());

    echo $username, $id_post, $text;

    // header("Location: /pages/index.php");
    pg_close($dbconnession);
?>