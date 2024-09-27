<?php
include "dbInitialization.php";

session_start();


$userID = $_SESSION['user_id'];
$msg = "";
if (isset($_SESSION['username'])){
    session_destroy();
}
$query = "DELETE FROM users WHERE userId= $userID";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

if ($result){
    $msg="<h4>Account Deleted</h4><br><br>";
} else {
    $msg1="record not updated";
}

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
                <?php echo $msg;?>
                <p>Return to <a href="movies.php">movies</a></p>
            </div>
            <div class="col-sm-4">
                 
            </div>
        </div>
    </body>
</html>
