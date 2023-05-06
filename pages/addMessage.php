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

<body>
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
        }
    ?>

    <div class="container">
        <div class="content">

            <form action="/script/backAddMessage.php" method="post" enctype="multipart/form-data">
                <div class="user-details">
                    <div class="input-box">
                        <label>
                            <span class="details">Friend to Follow</span>
                            <input type="text" placeholder="Insert the friend" name="friend" required>
                        </label>
                    </div>
                    <div class="input-box">
                        <label>
                            <span class="details">Message</span>
                            <input type="text" placeholder="Insert the message" name="message" required>
                        </label>
                    </div>
                </div>

                <div class="button">
                    <input type="submit" value="Send Message">
                </div>
            </form>
        </div>
    </div>
</body>
</html>