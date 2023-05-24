<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login2.css">
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

    <div class="container" style="width: 70%">
        <div class="title">Login</div>
        <div class="content">

            <form name="loginForm" id="loginFormId">
                <div class="user-details">
                    <div class="input-box">
                        <label>
                            <span class="details">Username</span>
                            <!-- <input type="text" id="username" name="username" value="<?php echo isset($submitted_username) ? $submitted_username : ''; ?>" required placeholder="<?php echo isset($submitted_username) ? '' : 'Insert the username'; ?>"> -->
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

<script src="/js/login.js"></script>
