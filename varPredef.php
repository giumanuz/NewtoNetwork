<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['name'])){
        echo "Welcome, " . $_GET['name'] . "!";
        $_SESSION['name'] = $_GET['name'];
    } else {
        echo "Welcome back, " . $_SESSION['name'] . "!";
    }
    foreach($GLOBALS as $key => $value){
        echo "$key =>";
        print_r($value);
        echo "<br><hr><br>";
    }

    session_destroy();

    ?>
</body>
</html>