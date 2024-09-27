<?php
include "dbInitialization.php";

session_start();

$msg = "";
if (!isset($_SESSION['username'])){
    $msg = "<h4>Login Required</h4>";
} else {
     $msg = "Welcome,".$_SESSION['name'];
}

$newComment = $_POST['comments'];
$newRating = $_POST['quality'];
$date = $_POST['date'];
$theID = $_POST['id'];
$movieID = $_POST['movieid'];

$message ="";
$query = "UPDATE reviews SET review='$newComment', rating='$newRating' WHERE reviewId=$theID;";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

if ($result){
    $message="<h4>Review edited</h4><br><br><b>Comments:</b> ".$newComment. "<br><br>". 
            "<b>Ratings: </b>".$newRating."<br><br>"."<b>Date Posted:</b>".$date."<br><br>";
} else {
     $message="record not updated";
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
                <?php if (isset($_SESSION['username'])) { 
                    echo $message; ?>
                    <p style="color: white;"><a href="movieReview.php?id=<?php echo $movieID; ?>">Back</a> to reviews page!</p>
                <?php } else {
                    echo $msg; ?>
                    <p>Please<a href="Login.php">Login</a></p>
                <?php } ?>
            </div>
            <div class="col-sm-4">
                 
            </div>
        </div>
    </body>
</html>
