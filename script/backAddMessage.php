<?php
    if ($_SERVER['REQUEST_METHOD'] != 'POST'){
        header("Location: /pages/login.php");
    }

    if (!isset($_POST['friend']) || !isset($_POST['message'])){
        print_r("Error: missing data");
        return;
    }
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    include "../connection.php";

    $friend = $_POST['friend'];
    $message = $_POST['message'];
    $username = $_SESSION['username'];

    if ($friend == $username){
        print_r("Error: you can't send a message to yourself");
        return;
    }

    $query = "SELECT * FROM users WHERE username = $1";
    $result = pg_query_params($dbconnession, $query, array($friend)) or die("Query failed: " . pg_last_error());
    if (pg_num_rows($result) == 0){
        print_r("Error: friend not found");
        return;
    }

    $query = "SELECT * FROM friends WHERE (user_id = $1 AND friend_user_id = $2) OR (user_id = $2 AND friend_user_id = $1)";
    $result = pg_query_params($dbconnession, $query, array($username, $friend)) or die("Query failed: " . pg_last_error());
    if (pg_num_rows($result) == 0){
        print_r("Error: you are not friend with this user");
        return;
    }

    $query = "INSERT INTO messages (sender, receiver, message_content) VALUES ($1, $2, $3)";
    $result = pg_query_params($dbconnession, $query, array($username, $friend, $message)) or die("Query failed: " . pg_last_error());
    if (!$result){
        print_r("Error: message not sent");
        return;
    }

    header("Location: /index.php");

    pg_close($dbconnession);

?>