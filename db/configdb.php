<?php
  $server = "localhost";
  $user = "anandaca_admin";
  $pass = "Anurag@2002";
  $dbname = "nemhr";

  // Create connection
  $conn = new mysqli($server, $user, $pass, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  
  return $conn;
?>
