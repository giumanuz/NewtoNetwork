<?php
    if ($_SERVER['REQUEST_METHOD'] != 'POST'){
        header("Location: /pages/login.php");
    }

    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    include "../connection.php";

    $data= json_decode(file_get_contents('php://input'), true);
    $username = $_SESSION['username'];  
    $friend = $data['friend'];
    $message = $data['message'];

    if ($friend == $username){
        print_r("You can't send a message to yourself");
        return;
    }

    if ($message == ""){
        print_r("You can't send an empty message");
        return;
    }

    $query = "SELECT * FROM users WHERE username = $1";
    $result = pg_query_params($dbconnession, $query, array($friend)) or die("Query failed: " . pg_last_error());
    if (pg_num_rows($result) == 0){
        print_r("Friend not found");
        return;
    }

    $query = "SELECT * FROM friends WHERE (user_id = $1 AND friend_user_id = $2) OR (user_id = $2 AND friend_user_id = $1)";
    $result = pg_query_params($dbconnession, $query, array($username, $friend)) or die("Query failed: " . pg_last_error());
    if (pg_num_rows($result) == 0){
        print_r("You are not friend with this user");
        return;
    }

    $query = "INSERT INTO messages (sender, receiver, message_content) VALUES ($1, $2, $3)";
    $result = pg_query_params($dbconnession, $query, array($username, $friend, $message)) or die("Query failed: " . pg_last_error());
    if (!$result){
        print_r("Message not sent");
        return;
    }

    $query = "INSERT INTO notifications (user_from, user_to, notification_content) VALUES ($1, $2, $3)";
    $result = pg_query_params($dbconnession, $query, array($username, $friend, "sent you a new message.")) or die("Query failed: " . pg_last_error());
    if (!$result){
        print_r("Notification not sent");
        return;
    }

    print_r("success");

    pg_close($dbconnession);

?>