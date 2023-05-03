<?php 
  require_once("../db-connection.php");

  $title = isset($_POST["title"]) ? "%" . $_POST["title"] . "%" : null;

  if ($title != null) {
    $cm = "SELECT * FROM video where name LIKE ?";
    $exec = $dbCon->prepare($cm);
    $exec -> bind_param("s", $title);
  
    if (!$exec -> execute()) {
      die(json_encode(array("status" => false, "data" => "Execute query failed")));
    }
  
    $result = $exec -> get_result();
    $data_arr = [];
    while($row = $result->fetch_assoc()) {
      $data_arr[] = $row;
    }
  
    echo json_encode(array("status" => "ok", "data" => $data_arr));
  } else {
    echo json_encode(array("status" => "failed", "data" => "Not enough parameter"));
  }
  
?>