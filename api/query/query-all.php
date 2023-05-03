<?php 
  require_once("../db-connection.php");

  $cm = "SELECT * FROM video";
  $exec = $dbCon->prepare($cm);

  if (!$exec -> execute()) {
    die(json_encode(array("status" => false, "data" => "Execute query failed")));
  }

  $result = $exec -> get_result();
  $data_arr = [];
  while($row = $result->fetch_assoc()) {
    $data_arr[] = $row;
  }

  echo json_encode(array("status" => true, "data" => $data_arr));
?>