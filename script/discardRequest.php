<?php
    if ($_SERVER['REQUEST_METHOD'] != 'GET'){
        header("Location: index.php");
    }
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    include "../connection.php";

    $sender = $_GET['sender'];
    $reciver = $_SESSION['username'];
    $query = "DELETE FROM friend_requests WHERE sender = $1 AND reciver = $2";
    $result = pg_query_params($dbconnession, $query, array($sender, $reciver)) or die("Query failed: " . pg_last_error());
    header("Location: /pages/index.php");

?>