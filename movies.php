<?php
include "dbInitialization.php";

session_start();
$querySelect = "SELECT * FROM movies";



    // execute sql query
$resultSelect = mysqli_query($link, $querySelect);
    // process the result
while ($row = mysqli_fetch_assoc($resultSelect)){ 
    $arrResult[] = $row;
    
}

$msg = "";
if (isset($_SESSION['username'])){
    $msg = "Welcome, ".$_SESSION['name'];
}

mysqli_close($link);

?>




<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Movie Review App</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>   
    </head>
   <body>
    <?php include "navbar.php"; ?>
    <div class="container text-center">
        <h4 style="color: white;">List of movies</h4>

        <div class="row">
            <div class="col-sm-6"></div>
            <?php
            $count = 0;
            $newRow = true;

            if ($newRow) {
                echo "<div class='row'>";
                $newRow = false;
            }
            for ($i = 0; $i < count($arrResult); $i++) {
                $movieID = $arrResult[$i]['movieId'];
                $pic = $arrResult[$i]['picture'];
                $title = $arrResult[$i]['movieTitle'];
                $genre = $arrResult[$i]['movieGenre'];
            ?>

            <div class="col-sm-4">
                <div class="card bg-warning" style="width: 300px;">
                    <img class="card-img-top" src="images/<?php echo $pic; ?>" 
                        alt="<?php echo $title; ?>" title="<?php echo $title; ?>">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $title; ?></h4>
                        <p class="card-text"><?php echo $genre; ?></p>
                        <a href="movieInfo.php?id=<?php echo $movieID; ?>" type="button"
                            class="btn btn-primary">See more</a>
                    </div>
                </div>
            </div>

            <?php
                $count++;
                // Check if a new row should start
                if ($count == 3) {
                    echo "</div>";
                    $newRow = true;
                    $count = 0;
                }
            }
            ?>
            <div class="col-sm-4"></div>
        </div>
    </div>
</body>

</html>