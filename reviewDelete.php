<?php
include "dbInitialization.php";

session_start();

$msg = "";
if (!isset($_SESSION['username'])){
    $msg = "<h4>Login Required</h4>";
} else {
     $msg = "Welcome,".$_SESSION['name'];
}

$theID = $_GET['id'];
$query = "SELECT * FROM reviews R WHERE reviewId= $theID";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);

if (!empty($row)){
    $reviewID = $row['reviewId'];
    $user = $row['userId'];
    $movie = $row['movieId'];
    $comment = $row['review'];
    $rating = $row['rating'];
    $date = $row['datePosted'];
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
                    <form method="post" action="doReviewDelete.php">
                        <h4>Delete review</h4><br><br>
                        <input type="hidden" name="id" value="<?php echo $reviewID?>"/>
                        <input type="hidden" name="movieid" value="<?php echo $movie?>"/>
                        <b>Comments:</b> <?php echo $comment ?> <br><br>
                        <b>Ratings:</b> <?php echo $rating ?><br><br>
                        <b>Date Posted: </b><?php echo $date ?><br><br>
                        <h4><input class="btn btn-primary" type="submit" value="Confirm Delete review"></h4>
                    </form>
                    <p style="color: white;"><a href="movieReview.php?id=<?php echo $movieID; ?>">Back</a> to reviews page!</p>
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
