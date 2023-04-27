<?php
    if ($_SERVER['REQUEST_METHOD'] != 'POST'){
        header("Location: /pages/addFriend.php");
    }
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    include "../connection.php";

    $friendToFollow = $_POST['friend'];
    if ($friendToFollow == $_SESSION['username']){
        header("Location: /pages/addFriend.php?status=errorUsernameYou");
    }
    else{
        $query1 = "SELECT * FROM friend_requests WHERE sender = $1 AND reciver = $2";
        $result1 = pg_query_params($dbconnession, $query1, array($_SESSION['username'], $friendToFollow)) or die("Query failed: " . pg_last_error());
        $line1 = pg_fetch_array($result1, null, PGSQL_ASSOC);
        if ($line1['user_id'] != null){
            header("Location: /pages/addFriend.php?status=errorAlreadySent");
        }
        else{
            $query2 = "SELECT user_id FROM friends WHERE user_id = $1 AND friend_user_id = $2";
            $result2 = pg_query_params($dbconnession, $query2, array($_SESSION['username'], $friendToFollow)) or die("Query failed: " . pg_last_error());
            $line2 = pg_fetch_array($result2, null, PGSQL_ASSOC);
            if ($line2['user_id'] != null){

                header("Location: /pages/addFriend.php?status=errorAlreadyFriend");
            }
            else{
                $query3 = "SELECT username FROM users WHERE username = $1";
                $result3 = pg_query_params($dbconnession, $query3, array($friendToFollow)) or die("Query failed: " . pg_last_error());
                $line3 = pg_fetch_array($result3, null, PGSQL_ASSOC);
                if ($line3['username'] == null){
                    header("Location: /pages/addFriend.php?status=errorUsername");
                }
                else{
                    $query4 = "INSERT INTO friend_requests (sender, reciver) VALUES ($1, $2)";
                    $result4 = pg_query_params($dbconnession, $query4, array($_SESSION['username'], $friendToFollow)) or die("Query failed: " . pg_last_error());
                    header("Location: /index.php");
                }
            }
        }
    }

?>