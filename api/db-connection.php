<?php
  header("Access-Control-Allow-Origin: *");
  
  $dbHost = "localhost";
  $dbName = "web-lastsem";
  $dbUsername = "root";
  $dbPassword = "";

  $dbCon = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

  if ($dbCon -> connect_error) {
    die(json_encode( array('status' => false, 'data' =>" Connection error! " . $conn -> connect_error )));
  }
?>