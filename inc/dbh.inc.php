<?php

$serverName ="localhost";
$dBUserName ="root";
$dBUserPassword = "";
$dBName = "steinebasardb";

$conn = mysqli_connect($serverName, $dBUserName, $dBUserPassword, $dBName);

if(!$conn){
  die("Verbindung fehlgeschlagen: " . mysqli_connect_error());

}
?>
