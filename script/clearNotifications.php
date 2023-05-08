<?php
    if ($_SERVER['REQUEST_METHOD'] != 'GET'){
        header("Location: index.php");
    }
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    include "../connection.php";

    $query = "DELETE FROM notifications where user_to = $1";
    $result = pg_query_params($dbconnession, $query, array($_SESSION['username'])) or die("Query failed: " . pg_last_error());

?>