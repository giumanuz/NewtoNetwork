<?php
    if ($_SERVER['REQUEST_METHOD'] != 'POST'){
        header("Location: /pages/createPost.php");
    }
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    include "../connection.php";

    $post_content = $_POST['content'];
    $writer = $_SESSION['username'];
    // calcola quanti post ci sono nel databse
    $query1 = "SELECT COUNT(*) FROM posts";
    $result = pg_query($dbconnession, $query1) or die("Query failed: " . pg_last_error());
    $line = pg_fetch_array($result, null, PGSQL_ASSOC);
    $post_id = $line['count'] + 1;

    $photoToUpload = $_FILES["photo"]["tmp_name"];
    $photoToUpload = base64_encode(file_get_contents(addslashes($photoToUpload)));
    $query2 = "INSERT INTO posts (post_id, writer, post_content, photo) VALUES ($post_id, '$writer', '$post_content', '$photoToUpload')";
    if( $result = pg_query($dbconnession, $query2)){

        $query3 = "SELECT * FROM friends where user_id = $1";
        $result3 = pg_query_params($dbconnession, $query3, array($writer)) or die("Query failed: " . pg_last_error());
        while( $line3 = pg_fetch_array($result3, null, PGSQL_ASSOC)) {
            $friend = $line3['friend_user_id'];
            $query4 = "INSERT INTO notifications (user_from, user_to, notification_content) VALUES ($1, $2, $3)";
            $result4 = pg_query_params($dbconnession, $query4, array($writer, $friend, "has written a new posts.")) or die("Query failed: " . pg_last_error());
        }


        header("Location: /index.php");
    }else
        header("Location: /pages/createPost.php?status=errorUpload");

?>
