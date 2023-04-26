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

    $target_file = realpath(dirname(getcwd()));
    $target_file = $target_file . "/download/" . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image
    $check = getimagesize($_FILES["photo"]["tmp_name"]);

    if($check === false) {
        header("Location: /pages/createPost.php?status=errorFakeImage");
        $uploadOk = 0;
    }

    // if (file_exists($target_file)) {
    //     header("Location: /pages/createPost.php?status=errorFileExists");
    //     $uploadOk = 0;
    // }

    if ($_FILES["photo"]["size"] > 500000) {
        header("Location: /pages/createPost.php?status=errorSize");
        $uploadOk = 0;
    }

    if($imageFileType != "jpg" && $imageFileType != "jpeg") {

        header("Location: /pages/createPost.php?status=errorFileFormat");
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    // if everything is ok, try to upload file
    if ($uploadOk == 1) {
        // if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        $photoToUpload = $_FILES["photo"]["tmp_name"];
        // convert this photo in base64
        $photoToUpload = base64_encode(file_get_contents(addslashes($photoToUpload)));
        $query2 = "INSERT INTO posts (post_id, writer, post_content, photo) VALUES ($post_id, '$writer', '$post_content', '$photoToUpload')";
        if( $result = pg_query($dbconnession, $query2))
            header("Location: /index.php");
        } else {
            header("Location: /pages/createPost.php?status=errorUpload");
        // }
    }
?>
“La verità si ritrova sempre nella semplicità mai nella confusione.”

Sir Isaac Newton