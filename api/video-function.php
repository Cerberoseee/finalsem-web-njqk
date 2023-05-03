<?php 
  require_once("db-connection.php");

  $type = isset($_POST["type"]) ? $_POST["type"] : null;
  $videoId = isset($_POST["videoid"]) ? $_POST["videoid"] : null;

  if ($type != null) {
    if ($type == "like") {
      $cm = "UPDATE video SET likeCount = likeCount + 1 WHERE videoId = ?";

      $exec = $dbCon -> prepare($cm);
      $exec -> bind_param("s", $videoId);

      if (!$exec -> execute()) {
        die(json_encode(array("status" => false, "data" => "Execute query failed")));
      }

      echo json_encode(array("status" => "ok", "data" => "Executed succecss"));
    }
    
    if ($type == "dislike") {
      $cm = "UPDATE video SET dislikeCount = dislikeCount + 1 WHERE videoId = ?";

      $exec = $dbCon -> prepare($cm);
      $exec -> bind_param("s", $videoId);

      if (!$exec -> execute()) {
        die(json_encode(array("status" => false, "data" => "Execute query failed")));
      }

      echo json_encode(array("status" => "ok", "data" => "Executed succecss"));
    }
  }
?>