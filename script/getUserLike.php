<?php
    if ($_SERVER['REQUEST_METHOD'] != 'GET'){
        header("Location: index.php");
    }
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    include "../connection.php";

    $post_id = $_GET['post_id'];

    $query = "SELECT * FROM likes WHERE post_id = $1 LIMIT 1";
    $result = pg_query_params($dbconnession, $query, array($post_id));
    $line = pg_fetch_array($result, NULL, PGSQL_ASSOC);
    // se non ci sonno risultati stampa "" altriemnti stampa il nome dell'utente
    if (!$line)
        echo "";
    else
        echo $line['user_id'] ? $line['user_id'] : "";

    
    pg_close($dbconnession);
?>