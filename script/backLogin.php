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
                $name= $line2['first_name'];
                echo "Login successful, click <a href = '../home.php?name=$name'>here</a> to go to the home page"; 
                // TODO: redirect to home page
            }
            else{
                echo "Wrong password, please try again or click  <a href = '../pages/registration.php'>here</a> to register";
            }
        }
        else{
            echo "Email not found, please try again or click  <a href = '../pages/registration.php'>here</a> to register";
        }

        pg_close($dbconnession);

        ?>
</body>
</html>