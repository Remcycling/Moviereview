<?php
include "dbInitialization.php";

session_start();
$msg = "";
if (isset($_SESSION['username'])){
     $msg = "Welcome,".$_SESSION['name'];
}

$theID = $_GET['id'];
$querySelect = "SELECT * FROM reviews R, users U, movies M WHERE R.movieId = M.movieId AND R.userId = U.userId AND R.movieId = $theID;";


    // execute sql query
$resultSelect = mysqli_query($link, $querySelect);
    // process the result
while ($row = mysqli_fetch_assoc($resultSelect)){ 
    $arrResult[] = $row;
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
        <div class="container mt-3">
            <?php if (isset($_SESSION['username'])) { ?>
                <?php
                    for ($i = 0; $i < 1; $i++) {
                        $movieID = $arrResult[$i]['movieId'];
                        $title = $arrResult[$i]['movieTitle'];
                ?>
                <h4 style="color: white;">Movie Reviews for <?php echo $title;?></h4>
                    <?php }?>
              <p><a href="reviewAdd.php?id=<?php echo $movieID; ?>">Add new review</a></p> 
              <table class="table table-warning">
                <thead class="table table-primary">
                  <tr>
                    <th>Review</th>
                    <th>Rating</th>
                    <th>Date Posted</th>
                    <th>Username</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <?php
                    for ($i = 0; $i < count($arrResult); $i++) {
                        $reviewID = $arrResult[$i]['reviewId'];
                        $userID = $arrResult[$i]['userId'];
                        $user = $arrResult[$i]['username'];
                        $review = $arrResult[$i]['review'];
                        $rating = $arrResult[$i]['rating'];
                        $date = $arrResult[$i]['datePosted'];
                    ?>
                <tbody>
                  <tr>
                    
                    <td><?php echo $review;?></td>
                    <td><?php echo $rating;?></td>
                    <td><?php echo $date;?></td>
                    <td><?php echo $user;?></td>
                    <?php if ($_SESSION['username']== $user) {  ?>
                    <td><a href="reviewEdit.php?id=<?php echo $reviewID; ?>">Edit</a></td>
                    <td><a href="reviewDelete.php?id=<?php echo $reviewID; ?>">Delete</a></td>
                    <?php } else { ?>
                    <td></td>
                    <td></td>
                    <?php } ?>
                  </tr>
                    <?php  } ?>
            <?php } else { ?>
                   <?php
                    for ($i = 0; $i < 1; $i++) {
                        $movieID = $arrResult[$i]['movieId'];
                        $title = $arrResult[$i]['movieTitle'];
                ?>
                <h4 style="color: white;">Movie Reviews for <?php echo $title;?></h4>
                    <?php }?>
              <p><a href="reviewAdd.php?id=<?php echo $movieID; ?>">Add new review</a></p> 
              <table class="table table-warning">
                <thead class="table table-primary">
                  <tr>
                    <th>Review</th>
                    <th>Rating</th>
                    <th>Date Posted</th>
                    <th>Username</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <?php
                    for ($i = 0; $i < count($arrResult); $i++) {
                        $reviewID = $arrResult[$i]['reviewId'];
                        $userID = $arrResult[$i]['userId'];
                        $user = $arrResult[$i]['username'];
                        $review = $arrResult[$i]['review'];
                        $rating = $arrResult[$i]['rating'];
                        $date = $arrResult[$i]['datePosted'];
                    ?>
                <tbody>
                  <tr>
                    
                    <td><?php echo $review;?></td>
                    <td><?php echo $rating;?></td>
                    <td><?php echo $date;?></td>
                    <td><?php echo $user;?></td>
                    <td></td>
                    <td></td>
                    <?php } ?>
                  </tr>
                    <?php  } ?>
            </tbody>
          </table>
        </div>
        <p style="color: white;"><a href="movies.php">Back</a> to movies list page!</p>
    </body>
</html>
