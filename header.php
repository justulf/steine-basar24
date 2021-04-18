<?php
  session_start();

 ?>

<!doctype html>
<html lang="de">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Steine-Basar24.de</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Steine-Basar24</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarItems">
          <form class="d-flex me-auto">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Suchen</button>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Warenkorb</a>
            </li>
            <?php
              if(isset($_SESSION["usersId"])){
                echo "<li class='nav-item'> <a class='nav-link' href='#'>Profil</a></li>";
                echo "<li class='nav-item'> <a class='nav-link' href='inc/logout.inc.php'>Abmelden</a></li>";

              }else{
                echo '<li class="nav-item dropdown dropstart">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownItem" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Anmelden
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownItem">
                    <form action="inc/login.inc.php" method="post">
                      <div class="mb-3">
                          <li>
                            <label for="loginDropdownEmail" class="form-label">E-Mail-Adresse</label>
                            <input type="email" class="form-control" name="loginDropdownEmail" aria-describedby="emailHelp">
                          </li>
                      </div>
                      <div class="mb-3">
                          <li>
                            <label for="loginDropdownPassword" class="form-label">Passwort</label>
                            <input type="password" class="form-control" name="loginDropdownPassword" aria-describedby="emailHelp">
                          </li>
                      </div>
                      <div class="mb-3">
                          <li>
                            <a href="#">Passwort vergessen?</a>
                          </li>
                      </div>
                      <li>
                         <button type="submit" name="login-button"class="btn btn-primary">Anmelden</button>
                      </li>
                      <li>
                         <a href="signup.php">Jetzt Registrieren!</a>
                      </li>
                    </form>
                  </ul>
                </li>';
              }
             ?>
          </ul>
        </div>
      </div>
    </nav>

    <?php
    if(isset($_GET["error"])){
      if($_GET["error"] == "emptyinput"){
        echo "<p>Es müssen alle Felder ausgefüllt werden!</p>";

      }else if($_GET["error"] == "wronglogin"){
        echo "<p>Passwort oder E-Mail-Adresse falsch!</p>";

      }else if($_GET["error"] == "stmtfailed"){
        echo "<p>Es ist etwas schief gelaufen</p>";

      }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  </body>
</html>
