<?php 
  require_once("../db-connection.php");

  $userId = isset($_POST["userId"]) ? $_POST["userId"] : null;
  $file = isset($_FILES) ? $_FILES : null;
  $title = isset($_POST["title"]) ? $_POST["title"] : null;
  function processThumbnailUpload($file, $videoId) {
    $path = "../../uploads/videos/" . $videoId;
    if ( ! is_dir($path)) {
      mkdir($path, 0777, true);
    }
    move_uploaded_file($file["tmp_name"], $path . "/" . basename("thumbnail.") . pathinfo($file["name"], PATHINFO_EXTENSION));

    return "uploads/videos/"  . $videoId . "/" . basename("thumbnail.") . pathinfo($file["name"], PATHINFO_EXTENSION);
  } 

  function processVideoUpload($file, $videoId) {
    $path = "../../uploads/videos/" . $videoId ;
    if ( ! is_dir($path)) {
      mkdir($path, 0777, true);
    }
    
    move_uploaded_file($file["tmp_name"], $path . "/" . basename("video.") . pathinfo($file["name"], PATHINFO_EXTENSION));

    return "uploads/videos/" . $videoId . "/" . basename("thumbnail.") . pathinfo($file["name"], PATHINFO_EXTENSION);
  }  

  if ($userId != null && $file != null && $title != null) {
    $videoId = crc32(uniqid());
    $thumbnailPath = processThumbnailUpload($file["thumbnail"], $videoId);
    $videoPath = processVideoUpload($file["video"], $videoId);
    $tags = isset($_POST["tags"]) ? $_POST["tags"] : "";
    $views = 0;
    $uploadTime = date("yyyy-MM-dd hh:mm:ss");
    
    $description = isset($_POST["description"]) ? $_POST["description"] : "";
    $ageRestricted = isset($_POST["age_restric"]) ? $_POST["age_restric"] : "";

    //SQL Execution here

    $cm = "INSERT INTO video VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("sssissiisssi", $videoId, $title, $description, $views, $thumbnailPath, $tags, 0, 0, $uploadTime, "active", $videoPath, intval($ageRestricted));
    $exec -> execute();
    $result = $exec -> get_result();

    
    //unlink("../../uploads/videos/temp/" . $userId . "/" . basename("video.") . pathinfo($file["video"]["name"], PATHINFO_EXTENSION));
    echo json_encode(array("status" => true, "header" =>
      array("content" => "Upload sucessfully", "id"=> $videoId)
    ));
  }

?>