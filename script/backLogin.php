<?php
    if ($_SERVER['REQUEST_METHOD'] != 'POST'){
        header("Location: /pages/login.php");
    }
    include "../connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php

        $username = $_POST['username'];
               
        $query = "SELECT * FROM users WHERE username = $1";
        $result = pg_query_params($dbconnession, $query, array($username)) or die("Query failed: " . pg_last_error());
        if ($line= pg_fetch_array($result)){

            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $query2 = "SELECT * FROM users WHERE username = $1 AND passw = $2";
            $result2 = pg_query_params($dbconnession, $query2, array($username, $password)) or die("Query failed: " . pg_last_error());
            if ($line2 = pg_fetch_array($result2, null, PGSQL_ASSOC)){
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
</body>
</html>