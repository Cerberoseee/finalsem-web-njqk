<?php 
  require_once("db-connection.php");

  $type = isset($_POST["type"]) ? $_POST["type"] : null;
  $videoId = isset($_POST["videoid"]) ? $_POST["videoid"] : null;
  $userId = isset($_POST["userid"]) ? $_POST["userid"] : null;

  $playlistId = isset($_POST["playlistid"]) ? $_POST["playlistid"] : null;

  $content = isset($_POST["comment"]) ? $_POST["comment"] : null;

  if ($type != null) {
    if ($type == "like") {
      $cm = "UPDATE video SET likeCount = likeCount + 1 WHERE videoId = ?";

      $exec = $dbCon -> prepare($cm);
      $exec -> bind_param("s", $videoId);

      if (!$exec -> execute()) {
        die(json_encode(array("status" => false, "data" => "Execute query failed")));
      }

      echo json_encode(array("status" => true, "data" => "Executed succecss"));
    }
    
    if ($type == "dislike") {
      $cm = "UPDATE video SET dislikeCount = dislikeCount + 1 WHERE videoId = ?";

      $exec = $dbCon -> prepare($cm);
      $exec -> bind_param("s", $videoId);

      if (!$exec -> execute()) {
        die(json_encode(array("status" => false, "data" => "Execute query failed")));
      }

      echo json_encode(array("status" => true, "data" => "Executed succecss"));
    }

    

    if ($type == "post-comment") {
      $id = crc32(uniqid());
      
      $cm = "INSERT INTO comment VALUES (?, ?, ?, ?)";

      $exec = $dbCon -> prepare($cm);
      $exec -> bind_param("ssss", $id, $userId, $content, $videoId);

      if (!$exec -> execute()) {
        die(json_encode(array("status" => false, "data" => "Execute query failed")));
      }

      $result = $exec -> get_result();
      $data_arr = [];
      while($row = $result->fetch_assoc()) {
        $data_arr[] = $row;
      }
    
      echo json_encode(array("status" => true, "data" => $data_arr));
    }

    if ($type == "get-comment") {
      $id = crc32(uniqid());
      
      $cm = "SELECT * FROM comment 
        JOIN users_account ON comment.userId = users_account.userId
      WHERE comment.videoId = ?";

      $exec = $dbCon -> prepare($cm);
      $exec -> bind_param("s", $videoId);

      if (!$exec -> execute()) {
        die(json_encode(array("status" => false, "data" => "Execute query failed")));
      }

      $result = $exec -> get_result();
      $data_arr = [];
      while($row = $result->fetch_assoc()) {
        $data_arr[] = $row;
      }
    
      echo json_encode(array("status" => true, "data" => $data_arr));
    } 
  }
?>