<?php

function emptyInputSignup($name, $surname, $email, $pwd, $pwdRepeat){
    $result;

    if(empty($name) || empty($surname) || empty($email) || empty($pwd) || empty($pwdRepeat)){
      $result = true;

    }else{
      $result = false;

    }

    return $result;
}

function invalidNames($name, $surname){
    $result;

    if(!preg_match("/^[a-zA-Z]*$/", $name, $surname)){
      $result = true;

    }else{
      $result = false;
    }

    return $result;
}

function invalidEmail($email){
    $result;

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $result = true;

    }else{
      $result = false;
    }

    return $result;
}

function invalidPwd($pwd){
  //Testen ob PW mind. 6 Zeichen lang ist maybe auch ob ein Sonderzeichen und Zahl vorhanden ist
  $result;

  if(2 === 1){
    $result = true;

  }else{
    $result = false;
  }

  return $result;
}

function pwdMatch($pwd,$pwdRepeat){
  $result;

  if($pwd !== $pwdRepeat){
    $result = true;

  }else{
    $result = false;
  }

  return $result;
}

function emailExists($conn, $email){
  $sql = "SELECT * FROM users WHERE usersEmail = ?;";
  $stmt = mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);

  $resultsData = mysqli_stmt_get_result($stmt);

  if($row = mysqli_fetch_assoc($resultsData)){
    return $row;


  }else{
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $surname, $email, $pwd){
  $sql = "INSERT INTO users (usersName, userSurname, usersEmail, usersPwd) VALUES (?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../signup.php?error=stmtfailed");
    exit();
  }

  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "ssss", $name, $surname , $email, $hashedPwd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header("location: ../index.php?error=none");
  exit();
}

function emptyInputLogin($email, $pwd){
    $result;

    if(empty($email) || empty($pwd)){
      $result = true;

    }else{
      $result = false;

    }

    return $result;
}
function loginUser($conn, $email, $pwd){
  $emailExists = emailExists($conn, $email);

  if($emailExists === false){
    header("location: ../index.php?error=wronglogin");
    exit();
  }

  $pwdHashed = $emailExists["usersPwd"];
  $checkPwd = password_verify($pwd, $pwdHashed);

  if($checkPwd === false){
    header("location: ../index.php?error=wronglogin");
    exit();

  }else if($checkPwd === true){
    session_start();
    $_SESSION["usersId"] = $emailExists["usersId"];
    $_SESSION["usersEmail"] = $emailExists["usersEmail"];
    header("location: ../index.php");
    exit();
  }
}
 ?>
