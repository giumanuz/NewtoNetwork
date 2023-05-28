<?php
    $dbconnession = pg_connect("host=localhost user=postgres password=giulio dbname=NewtoNetwork") or die("Could not connect: " . pg_last_error());
?>