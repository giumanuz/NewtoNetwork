<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    

<title>
  Add Quote
</title>
</head>

    <?php
    
        include "navigationBar.php";
        if (isset($_GET['status'])) {
            if ($_GET['status'] == "errorUsername") {
                echo "<div class='alert alert-danger' role='alert'>
                The username you inserted doesn't exist!
                </div>";
            }
            if ($_GET['status'] == "errorUsernameYou") {
                echo "<div class='alert alert-danger' role='alert'>
                You can't follow yourself!
                </div>";
            }
            if ($_GET['status'] == "errorAlreadySent") {
                echo "<div class='alert alert-danger' role='alert'>
                You already sent a request to this user!
                </div>";
            }
            if ($_GET['status'] == "errorAlreadyFriend") {
                echo "<div class='alert alert-danger' role='alert'>
                You are already friend with this user!
                </div>";
            }
        }
    ?>

        
<body>

    <div class="container">
        <div class="content">

            <form action="/script/backAddFriend.php" method="post" enctype="multipart/form-data">
                <div class="user-details">
                    <div class="input-box">
                        <label>
                            <span class="details">Friend to Follow</span>
                            <input type="text" placeholder="Insert the friend" name="friend" required>
                        </label>
                    </div>
                </div>

                <div class="button">
                    <input type="submit" value="Add Post">
                </div>
            </form>
        </div>
    </div>
</body>
</html>