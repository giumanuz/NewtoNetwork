<?php
    if ($_SERVER['REQUEST_METHOD'] != 'POST'){
        header("Location: /pages/addQuote.php");
    }
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    include "../connection.php";

    $writer = $_POST['writer'];
    $phrase = $_POST['phrase'];
    // take the extension of the file
    $extension = explode('.', $_FILES["photo"]["name"]);

    $target_file = realpath(dirname(getcwd()));
    $target_file = $target_file . "/download/" . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image
    $check = getimagesize($_FILES["photo"]["tmp_name"]);

    // if ($_FILES["photo"]["size"] > 500000) {
    //     header("Location: /pages/addQuote.php?status=errorSize");
    //     $uploadOk = 0;
    // }

    if ($uploadOk == 1)
        $photoToUpload = $_FILES["photo"]["tmp_name"];
        $photoToUpload = base64_encode(file_get_contents(addslashes($photoToUpload)));
        $query2 = "INSERT INTO quotes (writer, phrase, extensions, photo) VALUES ('$writer', '$phrase', '$extension[1]', '$photoToUpload')";
        if( $result = pg_query($dbconnession, $query2))
            header("Location: /index.php");
        else
            header("Location: /pages/addQuote.php?status=errorUpload");
        
?>