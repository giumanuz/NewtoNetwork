<?php
    if ($_SERVER['REQUEST_METHOD'] != 'GET'){
        header("Location: index.php");
    }
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    include "../connection.php";

    $sender = $_GET['sender'];
    $receiver = $_SESSION['username'];
    $query = "DELETE FROM friend_requests WHERE sender = $1 AND receiver = $2";
    $result = pg_query_params($dbconnession, $query, array($sender, $receiver)) or die("Query failed: " . pg_last_error());
    $query = "INSERT INTO notifications (user_from, user_to, notification_content) VALUES ($1, $2, $3)";
    $result = pg_query_params($dbconnession, $query, array($receiver, $sender, "declined your friend request")) or die("Query failed: " . pg_last_error());

    pg_close($dbconnession);

?>