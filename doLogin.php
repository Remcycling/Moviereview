<?php
include "dbInitialization.php";
session_start();

$theUsername = $_POST['UN'];
$pw = $_POST['PW'];




$msg = "";

$queryCheck = "SELECT * FROM users
          WHERE username='$theUsername'
          AND password = SHA1('$pw')";

$resultCheck = mysqli_query($link, $queryCheck) or die(mysqli_error($link));



if (mysqli_num_rows($resultCheck) == 1) 
{
    $row = mysqli_fetch_array($resultCheck);
    $_SESSION['user_id'] = $row['userId'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['dob'] = $row['dob'];
    $_SESSION['email'] = $row['email'];
    
    $msg = "Username: ".$row["username"]."<br/><br/>".
                    "Name: ".$row["name"]."<br/><br/>".
                    "Date of Birth: ".$row["dob"]."<br/><br/>".
                    "Email: ".$row["email"]."<br/><br/>"; 
} else 
{
     $msg = "<p>No matching record found!</p>";
}

if (isset($_POST['remember'])){
    setcookie("UN", $row['username'], time()+60*60*24*365*10);
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
        <title>Movie Review App</title>
        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script> 
    </head>
    <body>
       
        <?php
        if (mysqli_num_rows($resultCheck) == 1)  { ?>
        <!--header-->
        <nav class="navbar navbar-expand-sm navbar-light bg-info">
            <div class="container-fluid">
              <a class="navbar-brand text-white" href="#">Movie Review</a>
              
              <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                  <li class="nav-item">
                      <a class="nav-link" href="movies.php">Movies</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="logout.php">Logout</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="accountDelete.php">Delete account</a>
                  </li>
                </ul>
                </div>

                <form class="d-flex">
                  <input class="form-control me-2" type="text" placeholder="Search">
                  <button class="btn btn-dark" type="button">Search</button>
                </form>
              </div>
            </div>
        </nav>
          <link rel="stylesheet" type="text/css" href="stylesheets/LoggedIn.css"/>
        <h6 class="welcome">Welcome, <?php echo $theUsername; ?></h6>
         <div class="row" style="margin-top: 50px;margin-left: 10px">
            <div class="col-sm-4">
                 
            </div>
            <div class="col-sm-4 bg-warning">
                <h4>Welcome</h4><br>
                <?php echo $msg; ?>
            </div>
             <p>Proceed to <a class="links" style="text-align: center" href="movies.php">Movies</a> list
            <div class="col-sm-4">
                 
            </div>
         </div>
        <?php }
        else{ ?>
        <!--header-->
        <nav class="navbar navbar-expand-sm navbar-light bg-info">
            <div class="container-fluid">
              <a class="navbar-brand text-white" href="#">Movie Review</a>
              
              <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                  <li class="nav-item">
                      <a class="nav-link" href="movies.php">Movies</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="Login.php">Login/Register</a>
                  </li>
                </ul>
                </div>

                <form class="d-flex">
                  <input class="form-control me-2" type="text" placeholder="Search">
                  <button class="btn btn-primary" type="button">Search</button>
                </form>
              </div>
        </nav>
        <link rel="stylesheet" type="text/css" href="stylesheets/LoggedOut.css"/>
        <div class="row" style="margin-top: 50px;margin-left: 10px">
            <div class="col-sm-4">
                 
            </div>
            <div class="col-sm-4 bg-warning">
                <h4>Login failed</h4>
                <p><?php echo $msg; ?></p>
            </div>
            <p><a class="links" href="Login.php">Login</a> again.</p>
            <div class="col-sm-4">
                 
            </div>
         </div>
        <?php }
        ?>
    </body>
</html>
