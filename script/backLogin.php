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

        $email = $_POST['email'];
               
        $query = "SELECT * FROM users WHERE email = $1";
        $result = pg_query_params($dbconnession, $query, array($email)) or die("Query failed: " . pg_last_error());
        if ($line= pg_fetch_array($result)){

            $password = $_POST['password1'];
            $query2 = "SELECT * FROM users WHERE email = $1 AND passw = $2";
            $result2 = pg_query_params($dbconnession, $query2, array($email, $password)) or die("Query failed: " . pg_last_error());
            if ($line2 = pg_fetch_array($result2, null, PGSQL_ASSOC)){
                session_start();
                $name= $line2['first_name'];
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header("Location: /pages/login.php?status=success");

            }
            else{
                header("Location: /pages/login.php?status=errorPassword");
            }
        }
        else{
            header("Location: /pages/login.php?status=errorEmail");
        
        }

        pg_close($dbconnession);

        ?>
</body>
</html>