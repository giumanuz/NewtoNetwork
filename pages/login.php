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

        if( isset($_GET['status'])  && $_GET['status'] == 'errorPassword'):
            echo '<div class="alert alert-danger" role="alert">
                    <strong>Error!</strong> Wrong Password, try again or click <a href = "/pages/registration.php">here</a> to register.
                </div>';
        endif;

        if ( isset($_GET['status'])  && $_GET['status'] == 'errorUsername'):
            echo '<div class="alert alert-danger" role="alert">
                    <strong>Error!</strong> Wrong Username, try again or click <a href = "/pages/registration.php">here</a> to register.
                </div>';
        endif;
    ?>


    <div class="container">
        <div class="content">

            <form action="/script/backLogin.php" method="post" name="loginForm" onsubmit="">
                <div class="user-details">
                    <div class="input-box">
                        <label>
                            <span class="details">Username</span>
                            <input type="text" placeholder="Insert the username" name="username" required>
                        </label>
                    </div>
                    <div class="input-box">
                        <label>
                            <span class="details">Password</span>
                            <input type="password" placeholder="Insert the password" name="password" required>
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