<?php 
  require_once("db-connection.php");

  $userId = isset($_POST["userId"]) ? $_POST["userId"] : null;
  $file = isset($_FILES) ? $_FILES : null;
  $title = isset($_POST["title"]) ? $_POST["title"] : null;

  function processThumbnailUpload($file, $videoId) {
    $path = "../../uploads/videos/" . $videoId;
    if ( ! is_dir($path)) {
      mkdir($path);
    }
    move_uploaded_file($file["tmp_name"], $path . "/" . basename("thumbnail.") . pathinfo($file["name"], PATHINFO_EXTENSION));

    return "uploads/videos/"  . $videoId . "/" . basename("thumbnail.") . pathinfo($file["name"], PATHINFO_EXTENSION);
  } 

  function processVideoUpload($file, $videoId) {
    $path = "../../uploads/videos/" . $videoId ;
    if ( ! is_dir($path)) {
      mkdir($path);
    }
    move_uploaded_file($file["tmp_name"], $path . "/" . basename("video.") . pathinfo($file["name"], PATHINFO_EXTENSION));

    return "uploads/videos/" . $videoId . "/" . basename("thumbnail.") . pathinfo($file["name"], PATHINFO_EXTENSION);
  }  

  if ($userId != null && $file != null && $title != null) {
    $videoId = crc32(uniqid());
    $thumbnailPath = processThumbnailUpload($file["thumbnail"], $videoId);
    $videoPath = processVideoUpload($file["video"], $videoId);
    
    $description = isset($_POST["description"]) ? $_POST["description"] : "";
    $ageRestricted = isset($_POST["age_restric"]) ? $_POST["age_restric"] : "";

    //SQL Execution here


    unlink("../../uploads/videos/temp/" . $userId . "/" . basename("video.") . pathinfo($file["name"], PATHINFO_EXTENSION));
    echo json_encode(array("status" => "true", "content" => "Upload success"));
  }

?>