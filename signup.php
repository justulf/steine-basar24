<?php
  include_once "header.php";
?>

<section class="signup-form">
  <h2>Registrieren</h2>
  <div class="signup-form-form">
    <form action="inc/signup.inc.php" action="signup.inc.php" method="post">
      <input type="text" name="name" placeholder="Vorname">
      <input type="text" name="surname" placeholder="Nachname">
      <input type="text" name="email" placeholder="E-Mail-Adresse">
      <input type="password" name="pwd" placeholder="Passwort">
      <input type="password" name="pwd-repeat" placeholder="Passwort wiederholen">
      <button type="submit" name="register-button">Jetzt registrieren!</button>
    </form>
  </div>
  <?php
    if(isset($_GET["error"])){
      if($_GET["error"] == "emptyinput"){
        echo "<p>Es müssen alle Felder ausgefüllt werden!</p>";

      }else if($_GET["error"] == "invalidname"){
        echo "<p>Keine Sonderzeichen und Zahlen im Namen!</p>";

      }else if($_GET["error"] == "invalidemail"){
        echo "<p>Ungültige E-Mail-Adresse!</p>";

      }else if($_GET["error"] == "invalidpwd"){
        echo "<p>Ungültiges Passwort!</p>";

      }else if($_GET["error"] == "passwordsdontmatch"){
        echo "<p>Passwörter stimmen nicht!</p>";

      }else if($_GET["error"] == "emailexists"){
        echo "<p>Es gibt schon einen Account mit der E-Mail-Adresse!</p>";
        echo "<a href='#'>Passwort vergessen?</a>";

      }else if($_GET["error"] == "stmtfailed"){
        echo "<p>Es ist etwas schief gelaufen</p>";

      }else if($_GET["error"] == "none"){
        echo "<p>Registrierung erfolgreich</p>";

      }
    }
  ?>
</section>
