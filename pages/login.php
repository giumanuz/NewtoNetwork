<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/login.css">
    

<title>
  Login
</title>
</head>
<body>

    <?php
        include "navigationBar.php";

        if( isset($_GET['status']) && $_GET['status'] == 'success'):
            session_start();
            $name= $_SESSION['name'];
            $email= $_SESSION['email'];
            header("Location: /index.php");
        endif;

        if( isset($_GET['status'])  && $_GET['status'] == 'errorPassword'):
            echo '<div class="alert alert-danger" role="alert">
                    <strong>Error!</strong> Wrong Password, try again or click <a href = "/pages/registration.php">here</a> to register.
                </div>';
        endif;

        if ( isset($_GET['status'])  && $_GET['status'] == 'errorEmail'):
            echo '<div class="alert alert-danger" role="alert">
                    <strong>Error!</strong> Wrong Email, try again or click <a href = "/pages/registration.php">here</a> to register.
                </div>';
        endif;
    ?>


    <div class="container">
        <div class="content">

            <form action="/script/backLogin.php" method="post" name="registrationForm" onsubmit="">
                <div class="user-details">
                    <div class="input-box">
                        <label>
                            <span class="details">Email</span>
                            <input type="email" placeholder="Insert the email" name="email" required>
                        </label>
                    </div>
                    <div class="input-box">
                        <label>
                            <span class="details">Password</span>
                            <input type="password" placeholder="Insert the password" name="password1" required>
                        </label>
                    </div>
                </div>

                <div class="button">
                    <input type="submit" value="Login">
                </div>
            </form>
        </div>
    </div>
</body>
</html>