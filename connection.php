<?php
    $dbconnession = pg_connect("host=localhost user=postgres password=matteo dbname=NewtoNetwork") or die("Could not connect: " . pg_last_error());
?>