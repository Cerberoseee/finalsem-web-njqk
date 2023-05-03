<?php 
  require_once("../db-connection.php");

  $userId = isset($_POST["userid"]) ? $_POST["userid"] : null;

  if ($userId != null) {
    $cm = "SELECT * FROM video JOIN video_channel ON video.videoId = video_channel.videoId where video_channel.videoId = ?";
    $exec = $dbCon->prepare($cm);
    $exec -> bind_param("s", $userId);
  
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