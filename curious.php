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
        include "connection.php";
        include "pages/navigationBar.php";
?>
    <div class="container text-center my-3">
    

    <?php
        
        $query = "SELECT * FROM videos ORDER BY RANDOM() LIMIT 1";
        $result = pg_query($dbconnession, $query) or die("Query failed: " . pg_last_error());
        $line = pg_fetch_array($result, null, PGSQL_ASSOC);
        $url = $line['url'];
        $title = $line['title'];
        

    ?>
    
    <h1 style="margin-top:3rem"><?php echo $title; ?></h1>
    <iframe style="margin-top:3rem;" width="750" height="450" src="<?php echo $url; ?>" frameborder="0" allowfullscreen></iframe>
    <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=PLmJjfwOzmFSPLVvcsDxj8XXangaCjsV_L"  frameborder="0"  allowfullscreen></ -->
    </div>
</body>
</html>