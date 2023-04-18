<?php
    if ($_SERVER['REQUEST_METHOD'] != 'POST'){
        header("Location: /pages/registration.php");
    }
    include "../connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <?php

        $email = $_POST['email'];
        $query = "SELECT * FROM users WHERE email = $1";
        $result = pg_query_params($dbconnession, $query, array($email)) or die("Query failed: " . pg_last_error());
        if ($line= pg_fetch_array($result)){
            echo "Email already in use, please try again or click  <a href = '../pages/login.php'>here</a> to log in ";
        }
        else{

            $password = $_POST['password1'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $birthday = $_POST['bday'];

            $query2= "INSERT INTO users 
                (first_name, surname, email, passw, birthday)
                VALUES ($3, $4, $1, $2, $5)";
            $result2 = pg_query_params($dbconnession, $query2, array($email, $password, $name, $surname, $birthday)) or die("Query failed: " . pg_last_error());
            if ($result2){
                echo "Registration successful, click <a href = '../pages/login.php'>here</a> to log in";
            }
            else{
                echo "Registration failed, please try again";
            }
        }

        pg_close($dbconnession);

        ?>
</body>
</html>