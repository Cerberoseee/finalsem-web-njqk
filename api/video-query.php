<?php 
  require_once("db-connection.php");

  $data = file_get_contents("php://input");
  $query = json_decode($data, true);
  $type = isset($query["type"]) ? $query["type"] : null;
  //enum "user" | "search | "all" | "top" | "trend" | null

  switch ($type) {
    //User
    case "user":
      $userId = isset($query["userid"]) ? $query["userid"] : null;

      if ($userId != null) {
        $cm = "SELECT * FROM video 
          JOIN video_channel ON video.videoId = video_channel.videoId 
          JOIN users_account ON video_channel.userId = users_account.userId 
        WHERE video.userId = ?";
        
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
      
        echo json_encode(array("status" => true, "data" => $data_arr));
      } else {
        echo json_encode(array("status" => false, "data" => "Not enough parameter"));
      }
      break;

    //Search
    case "search":
      $title = isset($query["title"]) ? "%" . $query["title"] . "%" : null;

      if ($title != null) {
        $cm = "SELECT * FROM video 
          JOIN video_channel ON video.videoId = video_channel.videoId 
          JOIN users_account ON video_channel.userId = users_account.userId 
        WHERE video.name LIKE ?";
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
      
        echo json_encode(array("status" => true, "data" => $data_arr));
      } else {
        echo json_encode(array("status" => false, "data" => "Not enough parameter"));
      }
      break;

    //All
    case "all":
      $cm = "SELECT * FROM video 
      JOIN video_channel ON video.videoId = video_channel.videoId 
      JOIN users_account ON video_channel.userId = users_account.userId ";
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
      break;

    //Top view
    case "top":
      $cm = "SELECT * FROM video 
        JOIN video_channel ON video.videoId = video_channel.videoId 
        JOIN users_account ON video_channel.userId = users_account.userId 
      ORDER BY views DESC";
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
      break;

    //Trending
    case "trend":
      $cm = "SELECT * FROM video 
        JOIN video_channel ON video.videoId = video_channel.videoId 
        JOIN users_account ON video_channel.userId = users_account.userId 
      ORDER BY likeCount DESC";
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
      break;
    
    //null
    case null:
      die(json_encode(array("status" => false, "data" => "Not enough parameter")));
      break;
    
  }
  
?>