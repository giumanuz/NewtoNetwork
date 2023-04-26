<?php
    if ($_SERVER['REQUEST_METHOD'] != 'POST'){
        header("Location: /pages/login.php");
    }
    include "../connection.php";

    $username = $_POST['username'];
            
    $query = "SELECT * FROM users WHERE username = $1";
    $result = pg_query_params($dbconnession, $query, array($username)) or die("Query failed: " . pg_last_error());

    // check if the username exist
    if ($line= pg_fetch_array($result)){

        $password = $_POST['password'];
        $query2 = "SELECT * FROM users WHERE username = $1";
        $result2 = pg_query_params($dbconnession, $query2, array($username)) or die("Query failed: " . pg_last_error());
        $line2 = pg_fetch_array($result2, null, PGSQL_ASSOC);

        // check if the password is correct
        if (password_verify($password, $line2['passw'])){
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $line2['email'];
            header("Location: /index.php");

        }
        else{
            header("Location: /pages/login.php?status=errorPassword");
        }
    }
    else{
        header("Location: /pages/login.php?status=errorUsername");
    
    }

    pg_close($dbconnession);

?>