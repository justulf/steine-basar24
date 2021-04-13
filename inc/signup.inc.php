<?php

if(isset($_POST["register-button"])){

  $name = $_POST["name"];
  $surname = $_POST["surname"];
  $email = $_POST["email"];
  $pwd = $_POST["pwd"];
  $pwdRepeat = $_POST["pwd-repeat"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if(emptyInputSignup($name, $surname, $email, $pwd, $pwdRepeat) !== false){
    header("location: ../signup.php?error=emptyinput");
    exit();

  }

  if(invalidNames($name, $surname) !== false){
    header("location: ../signup.php?error=invalidname");
    exit();

  }

  if(invalidEmail($email) !== false){
    header("location: ../signup.php?error=invalidemail");
    exit();

  }

  if(invalidPwd($pwd) !== false){
    header("location: ../signup.php?error=invalidpwd");
    exit();

  }

  if(pwdMatch($pwd,$pwdRepeat) !== false){
    header("location: ../signup.php?error=passwordsdontmatch");
    exit();

  }

  if(emailExists($conn, $email) !== false){
    header("location: ../signup.php?error=emailexists");
    exit();
  }

  createUser($conn, $name, $surname, $email, $pwd);

}else {
  header("location: ../index.php");
  exit();

}
 ?>
