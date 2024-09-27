<?php
include "dbInitialization.php";

$rememberUsername = "";


if (isset($_COOKIE['UN'])){
    $rememberUsername = $_COOKIE['UN'];
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
       <?php include "navbarOut.php"; ?>
       <div class="row" style="margin-top: 50px;margin-left: 10px">
            <div class="col-sm-4">
                 
            </div>
            <div class="col-sm-4">
                <form class="bg-warning" id="fill" name="Login" method="post" action="doLogin.php">
                    <h4>Login</h4>
                    <label for="username">Username:</label>
                    <input class="enter" id="username" type="text" name="UN" size="20" maxlength="100" required autofocus 
                       placeholder="Username" value="<?php echo $rememberUsername; ?>"/> <br>

                    <br>
                    <label for="password">Password:</label>
                    <input class="enter" id="password" type="password" name="PW" size="20" maxlength="100" required
                        placeholder="Password"/><br>
                    <br>
                    <input id="remember" type="checkbox" name="remember" value="remember"> Remember me<br><br>
                    <h4><input class="btn btn-primary" type="submit" value="Login"></h4>
                </form>
                <p>Not a member yet? <a href="Registration.php">Register</a> now!</p>
            </div>
            
            <div class="col-sm-4">
                 
            </div>   
        </div>   
        
    </body>
</html>
