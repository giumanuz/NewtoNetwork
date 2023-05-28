<?php
    if ($_SERVER['REQUEST_METHOD'] != 'POST'){
        header("Location: /pages/registration.php");
    }
    include "../connection.php";

    $data = json_decode(file_get_contents('php://input'), true);
    $email = $data['email'];    
    

    $query1 = "SELECT * FROM users WHERE email = $1";
    $result = pg_query_params($dbconnession, $query1, array($email)) or die("Query failed: " . pg_last_error());
    if ($line= pg_fetch_array($result)){
        print_r("Email already used, try again or click <a href = '/pages/login.php'>here</a> to login.");
        return;
    }
    else{

        $username = $data['username'];
        $query2 = "SELECT * FROM users WHERE username = $1";
        $result = pg_query_params($dbconnession, $query2, array($username)) or die("Query failed: " . pg_last_error());
        if ($line= pg_fetch_array($result)){
            print_r("Username already used, try again or click <a href = '/pages/login.php'>here</a> to login.");
            return;
        }

        else{

            $password = password_hash($data['password'], PASSWORD_DEFAULT);
            $name = $data['name'];
            $surname = $data['surname'];
            $birthday = $data['bday'];
            

            $photoToUpload = $data['photo'];
            $exstension = $data['extension'];

            if ($photoToUpload == ""){
                $photoToUpload = "../images/defaultProfile.png";
                $photoToUpload = base64_encode(file_get_contents(addslashes($photoToUpload)));
                $exstension = "png";
            }

            $query3= "INSERT INTO users 
                (first_name, surname, email, passw, birthday, username, photo, extensionPhoto)
                VALUES ($4, $5, $1, $3, $6, $2, $7, $8)";
            $result2 = pg_query_params($dbconnession, $query3, array($email, $username, $password, $name, $surname, $birthday, $photoToUpload, $exstension)) or die("Query failed: " . pg_last_error());
            if ($result2){
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;

                print_r("success");
                return;
            }
            else{
                print_r("Registration failed, try again or click <a href = '/pages/login.php'>here</a> to login.");
                return;
            }
        }
    }

    pg_close($dbconnession);
?>