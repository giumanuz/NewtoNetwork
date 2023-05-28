<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
<title>
  Login
</title>
</head>

    <?php

        session_start();
        if (isset($_SESSION['username'])):
            header("Location: /index.php");
        endif;

        include "navigationBar.php";
    ?> 

<body>
    <div class="alert alert-danger fade" role="alert" id="errorAlert">
        <strong>Error!</strong> <span id="errorAlertText"> </span>
    </div>
    <div class="center">
        <h1>
            <strong>Login</strong>
        </h1>
         <form name="loginForm" id="loginFormId" method="post">
            <div class="txt_field">
                <input type="text" name="username" required>
                <label for="">Username</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" required>
                <label for="">Password</label>
            </div>
            <input type="submit" value="Login">
            <div class="signup_link">
                Not a member? <a href="/pages/registration.php">Signup</a>
            </div>
            
         </form>
    </div>
    
</body>
</html>
<script src="/js/login.js"></script>