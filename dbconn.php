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
    $dbconn=pg_connect("host=localhost port=5432 dbname=NewtoNetwork user=postgres password=matteo") or die("Could not connect: " . pg_last_error());
    $query="SELECT * FROM utente";
    $result=pg_query($dbconn, $query) or die("Query failed: " . pg_last_error());
    echo "<table>";
    $firstLine=true;
    while($line=pg_fetch_array($result, null, PGSQL_ASSOC)){
        echo "\t<tr>\n";
        if ($firstLine){
            foreach($line as $col_name => $col_value){
                echo "\t\t<th>$col_name</th>\n";
            }
            echo "\t</tr>\n\t<tr>\n";
            $firstLine=false;
        } 

        foreach($line as $col_name => $col_value){
            echo "\t\t<td>$col_value</td>\n";
        }
        echo "\t</tr>\n";
    }
    echo "</table>";
?>
</body>
</html>
