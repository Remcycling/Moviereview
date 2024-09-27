<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "c203_moviereviewdb";

// open connection
$link = mysqli_connect($host, $username, $password, $db) or 
        die(mysqli_connect_error());
?>
