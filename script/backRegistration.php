<?php
    if ($_SERVER['REQUEST_METHOD'] != 'POST'){
        header("Location: /pages/registration.php");
    }
    include "../connection.php";

    $email = $_POST['email'];
    $query1 = "SELECT * FROM users WHERE email = $1";
    $result = pg_query_params($dbconnession, $query1, array($email)) or die("Query failed: " . pg_last_error());
    if ($line= pg_fetch_array($result)){
        header("Location: /pages/registration.php?status=errorEmailUsed");
    }
    else{

        $username = $_POST['username'];
        $query2 = "SELECT * FROM users WHERE username = $1";
        $result = pg_query_params($dbconnession, $query2, array($username)) or die("Query failed: " . pg_last_error());
        if ($line= pg_fetch_array($result)){
            header("Location: /pages/registration.php?status=errorUsernameUsed");
        }

        else{

            $password = password_hash($_POST['password1'], PASSWORD_DEFAULT);
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $birthday = $_POST['bday'];
            $gender = $_POST['gender'];

            if ($_FILES['photo']['name'] == ""){
                $photoToUpload = "/images/defaultProfile.png";
                $photoToUpload = base64_encode(file_get_contents(addslashes($photoToUpload)));
                $exstension = "png";
            }
            else{
                $photoToUpload = $_FILES['photo']['tmp_name'];
                $photoToUpload = base64_encode(file_get_contents(addslashes($photoToUpload)));
                $exstension = explode('.', $_FILES["photo"]["name"]);
            }

            $query3= "INSERT INTO users 
                (first_name, surname, email, passw, birthday, username, gender, photo, extensionPhoto)
                VALUES ($4, $5, $1, $3, $6, $2, $7, $8, $9)";
            $result2 = pg_query_params($dbconnession, $query3, array($email, $username, $password, $name, $surname, $birthday, $gender, $photoToUpload, $exstension[1])) or die("Query failed: " . pg_last_error());
            if ($result2){
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;

                header("Location: /index.php");
            }
            else{
                header("Location: /pages/registration.php?status=errorRegistration");    
            }
        }
    }

    pg_close($dbconnession);

?>