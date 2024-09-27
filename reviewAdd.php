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
$querySelect = "SELECT * FROM reviews R, users U, movies M WHERE R.movieId = M.movieId AND R.userId = U.userId AND R.movieId = $theID;";

$result = mysqli_query($link, $querySelect) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);

if (!empty($row)){
    $movieID = $row['movieId'];
    $userID = $row['userId'];
    $user = $row['username'];
    $movie = $row['movieTitle'];
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
                    <form class="bg-warning" id="fill" name="AddReview" method="post" action="doReviewAdd.php">
                        <h4>Add Review</h4>
                        <input type="hidden" name="id" value="<?php echo $movieID?>"/>
                        <label for="username">Username:</label>
                        <input class="enter" id="username" type="text" name="userName" size="20" maxlength="100" value="<?php echo $_SESSION['username'];?>" disabled/> <br>
                        <label for="username">Comments:</label>
                        <textarea class="enter" id="comments" name="comments" maxlength="500" required
                               placeholder="Comments"/></textarea> <br>

                        <label for="Ratings">Ratings:</label>
                        <select id="Ratings" name="Ratings">
                            <option value="1" selected>1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select><br/><br/>
                         
                        <input type="hidden" name="date" value="<?php echo $date?>"/>
                        <h4><input class="btn btn-primary" type="submit" value="Submit review"></h4>
                    </form>
                    <p style="color: white;"><a href="movieReview.php?id=<?php echo $movieID; ?>">Back</a> to reviews page!</p>
                <?php } else { 
                    echo $msg;?>
                    <p>Please <a class="links" href="Login.php">Login</a></p>
    
            <?php } ?>
                </div>
            <div class="col-sm-4">
                 
            </div>
        </div>
    </body>
</html>
