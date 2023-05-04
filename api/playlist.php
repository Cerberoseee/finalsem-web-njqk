<?php 
  $type = isset($_POST["type"]) ? $_POST["type"] : null;
  $videoId = isset($_POST["videoid"]) ? $_POST["videoid"] : null;
  $userId = isset($_POST["userid"]) ? $_POST["userid"] : null;

  $playlistId = isset($_POST["playlistid"]) ? $_POST["playlistid"] : null;

  if ($type == "add-playlist") {
    $cm = "INSERT INTO playlist_details VALUES (?, ?)";

    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("ss", $playlistId, $videoId);

    if (!$exec -> execute()) {
      die(json_encode(array("status" => false, "data" => "Execute query failed")));
    }

    echo json_encode(array("status" => "ok", "data" => "Executed succecss"));
  }

  if ($type == "create-playlist") {
    $id = crc32(uniqid());

    $cm = "INSERT INTO video_playlist VALUES (?, ?, ?)";

    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("sss", $id, $playlistName, $userId);

    if (!$exec -> execute()) {
      die(json_encode(array("status" => false, "data" => "Execute query failed")));
    }

    echo json_encode(array("status" => "ok", "data" => "Executed succecss"));
  }

  if ($type == "query-playlist") {
    $cm = "SELECT * FROM video_playlist WHERE userId = ?";

    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("s", $userId);

    if (!$exec -> execute()) {
      die(json_encode(array("status" => false, "data" => "Execute query failed")));
    }

    echo json_encode(array("status" => "ok", "data" => "Executed succecss"));
  }

  if ($type == "query-video") {
    $cm = "SELECT * FROM detail_playlist
      JOIN video_playlist ON video.videoId = detail_playlist.videoId 
      JOIN users_account on users_account.userId = detail_playlist.userId
    WHERE detail_playlist.playlistId = ?";

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
  
    echo json_encode(array("status" => true, "data" => $data_arr));
  }

  if ($type = null) {
    die(json_encode(array("status" => false, "data" => "Not enough parameter")));
  }
?>  