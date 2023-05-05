<?php
  require_once('db-connection.php');

  $data = file_get_contents("php://input");
  $filter = json_decode($data, true);

  $type = isset($filter["type"]) ? $filter["type"] : null;
  $videoId = isset($filter["videoid"]) ? $filter["videoid"] : null;
  $userId = isset($filter["userId"]) ? $filter["userId"] : null;

  $playlistId = isset($filter["playlistid"]) ? $filter["playlistid"] : null;

  $playlistName = isset($filter["name"]) ? $filter["name"] : null;
  // Add video into playlist

  if ($type == "add-playlist") {
    $cm = "INSERT INTO playlist_detail VALUES (?, ?)";

    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("ss", $playlistId, $videoId);

    if (!$exec -> execute()) {
      die(json_encode(array("status" => false, "data" => "Execute query failed")));
    }

    echo json_encode(array("status" => true, "data" => "Executed succecss"));
  }
  // Create a new playlist
  if ($type == "create-playlist") {
    $id = crc32(uniqid());

    $cm = "INSERT INTO video_playlist VALUES (?, ?, ?)";

    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("sss", $id, $playlistName, $userId);

    if (!$exec -> execute()) {
      die(json_encode(array("status" => false, "data" => "Execute query failed")));
    }
    
    // Return the list of the playlist
    $cm = "SELECT * FROM video_playlist WHERE userId = ?";

    $exec = $dbCon -> prepare($cm);
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
  }

  if ($type == "query-playlist") {
    $cm = "SELECT * FROM video_playlist WHERE userId = ?";

    $exec = $dbCon -> prepare($cm);
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
  }
  // Get videos from playlist
  if ($type == "query-video") {
    $cm = "SELECT * FROM playlist_detail
    JOIN video ON video.videoId = playlist_detail.videoId 
    JOIN video_playlist ON video_playlist.playlistId = playlist_detail.playlistId
    JOIN users_account on users_account.userId = video_playlist.userId
    WHERE playlist_detail.playlistId = ?";

    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("s", $playlistId);

    if (!$exec -> execute()) {
      die(json_encode(array("status" => false, "data" => "Execute query failed")));
    }

    $result = $exec -> get_result();
    $data_arr = [];

    while($row = $result->fetch_assoc()) {
      $data_arr[] = $row;
    }

    // Select name
    $cm = "SELECT * FROM video_playlist WHERE playlistId = ?";
    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("s", $playlistId);

    if (!$exec -> execute()) {
      die(json_encode(array("status" => false, "data" => "Execute query failed")));
    }

    $result = $exec -> get_result();
    $name = $result->fetch_assoc();
    echo json_encode(array("status" => true, "data" => array("name"=> $name["playlistName"], "list"=> $data_arr)));
  }

  if ($type = null) {
    die(json_encode(array("status" => false, "data" => "Not enough parameter")));
  }
?>  