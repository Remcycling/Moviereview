<?php
include "dbInitialization.php";

session_start();

$msg = "";
if (isset($_SESSION['username'])){
    $msg = "Welcome,".$_SESSION['name'];
}

$theID = $_GET['id'];
$querySelect = "SELECT * FROM movies WHERE movieId=$theID";


    // execute sql query
$resultSelect = mysqli_query($link, $querySelect) or die(mysqli_error($link));
    // process the result
$row = mysqli_fetch_array($resultSelect);


if (!empty($row)){
    $movieID = $row['movieId'];
    $pic = $row['picture'];
    $title = $row['movieTitle'];
    $genre = $row['movieGenre'];
    $time = $row['runningTime'];
    $lan = $row['language'];
    $dir = $row['director'];
    $cast = $row['cast'];
    $syn = $row['synopsis'];
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
                <?php include "dbInitialization.php";if (!empty($row)) {?>
                    <h4><?php echo $title;?></h4>
                    <p><b>Movie Genre: </b><?php echo $genre; ?><br/><br/></p>
                    <p><b>Running Time: </b><?php echo $time; ?><br/><br/></p>
                    <p><b>Language: </b><?php echo $lan; ?><br/><br/></p>
                    <p><b>Director: </b><?php echo $dir; ?><br/><br/></p>
                    <p><b>Cast: </b><?php echo $cast; ?><br/><br/></p>
                    <p><?php echo $syn; ?><br/><br/></p>
                    <p><a href="movieReview.php?id=<?php echo $movieID; ?>"  type="button" class="btn btn-primary">See reviews</a></p>
                    <img src="images/<?php echo $pic;?>" width="460" height="648"><br/>
                    
                <?php } ?>
            </div>
            <div class="col-sm-4">
                
            </div>
        </div>
   
    </body>
</html>
