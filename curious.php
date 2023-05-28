<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    background-repeat: no-repeat; background-size: cover;background-image: linear-gradient(135deg, #71b7e6, #9b59b6); background-attachment: scroll;min-height:100vh;
    overflow: hidden;
}
</style>
<body>
    <?php
        include_once 'pages/navigationBar.php';
        // choose a random video from the table videos
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    
        include "./connection.php";
    ?>
    <div class="container text-center my-4">
     <?php
        $send='';
        $query = "SELECT * FROM videos ORDER BY RANDOM() LIMIT 1";
        $result = pg_query($dbconnession, $query) or die("Query failed: " . pg_last_error());
   
        while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            
            $video = $line['url'];
            $title = $line['title'];

            $send = $send . "
            <h1>" . $title . "</h1>
            <iframe style='margin-top:3rem;' width='800' height='500' src=". $video . " title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>";

        }
        echo $send;
    ?> 
    </div>
    
    
    
</body>
</html>