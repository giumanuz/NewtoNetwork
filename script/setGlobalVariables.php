<?php

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['username'])) {
    header("Location: /homepage.php");
}

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = $1";
    $result = pg_query_params($dbconnession, $query, array($username)) or die("Query failed: " . pg_last_error());
    $row = pg_fetch_array($result, null, PGSQL_ASSOC);
    $first_name = $row['first_name'];
    $surname = $row['surname'];
    $gender = $row['gender'];
    $birthday = $row['birthday'];
    $username = $row['username'];
    $user_email = $row['email'];
    $photoProfile = $row['photo'];
    $extensionProfile = $row['extensionphoto'];

} else {
    $first_name = "Mario";
    $surname = "Rossi";
    $gender = "male";
    $birthday = "04/10/2001";
    $username = "guest";
    $user_email = "guest@guest.com";

}
