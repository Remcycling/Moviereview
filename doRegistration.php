<?php
$theUsername = $_POST['userName'];
$pw = $_POST['password'];
$name = $_POST['personName'];
$dob = $_POST['dob'];
$email = $_POST['email'];

include "dbInitialization.php";


$querySelect = "INSERT INTO users(username, password, name, dob, email) "
        . "VALUES('$theUsername',SHA1('$pw'),'$name','$dob','$email')";

// execute sql query
$result = mysqli_query($link, $querySelect) or die('Error querying database');

// process the result
if($result) {
        $message = "Welcome<br/>";
} else {
        $message = "Registration failed\n ";
}

mysqli_close($link);

?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Movie Review App</title>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>   
    </head>
    <body>
       <?php include "navbarOut.php"; ?>
        <div class="row" style="margin-top: 50px;margin-left: 10px">
            <div class="col-sm-4">
                 
            </div>
            <div class="col-sm-4 bg-warning">
            <h4><?php
                echo $message;?></h4>
                <?php if($result) {
                    echo "Username: ".$theUsername."<br/><br/>"
                    . "Name: ".$name."<br/><br/>".
                    "Date of Birth: ".$dob."<br/><br/>".
                    "Email: ".$email."<br/><br/>";?>
                You are ready to login <a href="Login.php">here</a>!
            <?php } else{ ?>
                <p><a href="Registration.php">Register</a> again</p>
            <?php } ?>
            </div>
            <div class="col-sm-4">
                 
            </div>
        </div>
    </body>
</html>
