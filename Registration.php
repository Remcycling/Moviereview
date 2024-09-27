<?php
include "dbInitialization.php";

// create sql query
$queryCats = "SELECT * from users";


//FILL IN BLANK C
    // execute sql query
$resultCats = mysqli_query($link, $queryCats);
    // process the result
while ($row = mysqli_fetch_array($resultCats)){
    $arrCats[] = $row;     
}

    
//END BLANK C

// close connection
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
        <title>Movie Review App</title>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>   
    </head>
    <body>
       <?php include "navbarOut.php"; ?>
        <div class="row" style="margin-top: 50px;margin-left: 10px">
            <div class="col-sm-4">
                 
            </div>
            <div class="col-sm-4">
                <form class="bg-warning" id="fill" name="Register" method="post" action="doRegistration.php">
                    <h4>Register</h4>
                    <label for="username">Username:</label>
                    <input class="enter" id="username" type="text" name="userName" size="20" maxlength="100" required autofocus 
                           placeholder="Username"/> <br>

                    <label for="password">Password: </label>
                    <input class="enter" id="password" type="password" name="password" size="20" maxlength="100" required
                           placeholder="Password"/><br>

                    <label for="idName">Name:</label>
                    <input class="enter" id="idName" type="text" name="personName" size="20" maxlength="100" required autofocus
                          placeholder="Name"/><br>
                   
                    <label for="dob">Date of Birth:</label>
                    <input class="enter" id="dob" type="date" name="dob" required/><br>
                     
                    <label for="idEmail">Email:</label>
                    <input class="enter" id="idEmail" type="email" name="email" size="20" maxlength="100" required
                        placeholder="john@gmail.com"/><br>       

                    <h4><input class="btn btn-primary" type="submit" value="Register"></h4>
                </form>
            </div>
            <div class="col-sm-4">
                
            </div>
        </div>
    </body>
</html>
