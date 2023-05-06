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
    $category = $_POST['category'];

    $photoToUpload = $_FILES["photo"]["tmp_name"];
    $photoToUpload = base64_encode(file_get_contents(addslashes($photoToUpload)));
    $query2 = "INSERT INTO posts (writer, post_content, photo, category) VALUES ('$writer', '$post_content', '$photoToUpload', '$category')";
    if( $result = pg_query($dbconnession, $query2)){

        $query3 = "SELECT * FROM friends where user_id = $1";
        $result3 = pg_query_params($dbconnession, $query3, array($writer)) or die("Query failed: " . pg_last_error());
        while( $line3 = pg_fetch_array($result3, null, PGSQL_ASSOC)) {
            $friend = $line3['friend_user_id'];
            $query4 = "INSERT INTO notifications (user_from, user_to, notification_content) VALUES ($1, $2, $3)";
            $result4 = pg_query_params($dbconnession, $query4, array($writer, $friend, "has written a new posts.")) or die("Query failed: " . pg_last_error());
        }

        header("Location: /index.php");
    }else {
        // print the error
        echo pg_last_error($dbconnession);
        header("Location: /pages/createPost.php?status=errorUpload");
    }

?>
