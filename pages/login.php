<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/login.css">
    

<title>
  Login
</title>
</head>
<body>

    <?php
        include "navigationBar.php";

        if( isset($_GET['status']) && $_GET['status'] == 'success'):
            $name= $_SESSION['name'];
            echo $name;
            header("Location: ../index.php?name=$name");
        endif;

        if( isset($_GET['status'])  && $_GET['status'] == 'errorPassword'):
            echo '<div class="alert alert-danger" role="alert">
                    <strong>Errore!</strong> Password Errata, verifica di averla scritta correttamente, altrimenti clicca <a href = "../pages/registration.php">qui</a> per registrarti.
                </div>';
        endif;

        if ( isset($_GET['status'])  && $_GET['status'] == 'errorEmail'):
            echo '<div class="alert alert-danger" role="alert">
                    <strong>Errore!</strong> Email Errata, verifica di averla scritta correttamente, altrimenti clicca <a href = "../pages/registration.php">qui</a> per registrarti.
                </div>';
        endif;
    ?>


    <div class="container">
        <div class="content">

            <!-- <div class="title">
                <h1>Login</h1> -->

            <form action="../script/backLogin.php" method="post" name="registrationForm" onsubmit=""> <!-- TODO: aggiungi azione qui-->
                <div class="user-details">
                    <div class="input-box">
                        <label>
                            <span class="details">Email</span>
                            <input type="email" placeholder="Inserisci la tua email" name="email" required>
                        </label>
                    </div>
                    <div class="input-box">
                        <label>
                            <span class="details">Password</span>
                            <input type="password" placeholder="Inserisci la password" name="password1" required>
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