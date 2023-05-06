<?php 
  require_once("db-connection.php");

  $data = file_get_contents("php://input");
  $filter = json_decode($data, true);

  $type = isset($filter["type"]) ? $filter["type"] : null;
  $videoId = isset($filter["videoId"]) ? $filter["videoId"] : null;
  $userId = isset($filter["userId"]) ? $filter["userId"] : null;

  $playlistId = isset($filter["playlistid"]) ? $filter["playlistid"] : null;

  $content = isset($filter["comment"]) ? $filter["comment"] : null;

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
      
      $cm = "INSERT INTO comments VALUES (?, ?, ?, ?)";

      $exec = $dbCon -> prepare($cm);
      $exec -> bind_param("ssss", $id, $userId, $content, $videoId);

      if (!$exec -> execute()) {
        die(json_encode(array("status" => false, "data" => "Execute query failed")));
      }

      // Return posted cmt
      $cm = 
      "SELECT * FROM comments 
        JOIN users_account ON users_account.userId = comments.userId  
      WHERE comments.commentId = ? AND comments.userId = ? AND comments.videoId = ?";

      $exec = $dbCon -> prepare($cm);
      $exec -> bind_param("sss", $id, $userId, $videoId);
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
      
      $cm = "SELECT * FROM comments 
        JOIN users_account ON comments.userId = users_account.userId
      WHERE comments.videoId = ?";

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