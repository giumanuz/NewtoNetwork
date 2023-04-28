<?php
    if ($_SERVER['REQUEST_METHOD'] != 'GET'){
        header("Location: /index.php");
    }
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    session_destroy();

    header("Location: /homepage.php");
?>
