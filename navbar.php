  <!--header-->
       <?php if (isset($_SESSION['username'])) { ?>
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
        </nav>
       <link rel="stylesheet" type="text/css" href="stylesheets/LoggedIn.css"/>
       <br><h6 class="welcome"><?php echo $msg ?></h6>
       <?php } else { ?>
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
                  <button class="btn btn-dark" type="button">Search</button>
                </form>
              </div>
        </nav>
       <link rel="stylesheet" type="text/css" href="stylesheets/LoggedOut.css"/>
       <?php } ?>