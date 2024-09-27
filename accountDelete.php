<?php
include "dbInitialization.php";

session_start();

if (!isset($_SESSION['username'])){
    $msg = "<h4>Login Required</h4>";
} else {
     $msg = "Welcome,".$_SESSION['name'];
}
$userID = $_SESSION['user_id'];

$query = "SELECT * FROM users R WHERE userId= $userID";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);

if (!empty($row)){
    $user_id = $row['userId'];
    $user = $row['username'];
    $name = $row['name'];
    $dob = $row['dob'];
    $email = $row['email'];
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
        <?php include "navbar.php"; ?>
        <div class="row" style="margin-top: 50px;margin-left: 10px">
            <div class="col-sm-4">
                 
            </div>
            <div class="col-sm-4 bg-warning text-black">
                 <?php if (isset($_SESSION['username'])) { ?>
                    <form method="post" action="doAccountDelete.php">
                        <h4>Delete Account</h4><br><br>
                        <input type="hidden" name="id" value="<?php echo $user_id?>"/>
                        <b>Username:</b> <?php echo $user ?> <br><br>
                        <b>Name:</b> <?php echo $name ?><br><br>
                        <b>Date of Birth: </b><?php echo $dob ?><br><br>
                        <b>Email: </b><?php echo $email ?><br><br>
                        <h4><input class="btn btn-primary" type="submit" value="Confirm Delete account"></h4>
                    </form>
                 <?php } else { 
                    echo $msg; ?>
                    <p>Please <a class="links" href="Login.php">Login</a></p>
                <?php } ?>
                
            </div>
            <div class="col-sm-4">
                 
            </div>
        </div>
    </body>
</html>
