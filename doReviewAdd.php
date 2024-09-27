<?php
session_start();
if (!isset($_SESSION['username'])){
    $msg = "<h4>Login Required</h4>";
} else {
     $msg = "Welcome, ".$_SESSION['name'];
}
$user = $_SESSION['user_id'];

$comment = $_POST['comments'];
$rate = $_POST['Ratings'];
$date = date('Y-m-d');

include "dbInitialization.php";

$theID = $_POST['id'];
$querySelect = "INSERT INTO reviews(movieId, userId, review, rating, datePosted) "
        . "VALUES('$theID','$user','$comment','$rate',now())";

// execute sql query
$result = mysqli_query($link, $querySelect) or die('Error querying database');

// process the result
if($result) {
        $message = "<h4>Review added</h4><br><br><b>Comments:</b> ".$comment. "<br><br>". 
            "<b>Ratings: </b>".$rate."<br><br>"."<b>Date Posted:</b>".$date."<br><br>";
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
     
        <?php include "navbar.php" ?>
        <div class="row" style="margin-top: 50px;margin-left: 10px">
            <div class="col-sm-4">
                 
            </div>
            <div class="col-sm-4 bg-warning text-black">
                <?php if (isset($_SESSION['username'])) { ?>
                    <?php echo $message ?>
                    <p style="color: white;"><a href="movieReview.php?id=<?php echo $theID; ?>">Back</a> to reviews page!</p>
                
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
