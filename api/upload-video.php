<?php 
  require_once("db-connection.php");

  $userId = isset($_POST["userId"]) ? $_POST["userId"] : null;
  $file = isset($_FILES) ? $_FILES : null;


  function processThumbnailUpload($file, $videoId) {
    $path = "../uploads/videos/" . $videoId;
    if ( ! is_dir($path)) {
      mkdir($path);
    }
    move_uploaded_file($file["tmp_name"], $path . "/" . basename("thumbnail.") . pathinfo($file["name"], PATHINFO_EXTENSION));

    return "uploads/videos"  . $videoId . "/" . basename($file["name"]);
  } 

  function processVideoUpload($file, $videoId) {
    $path = "../uploads/videos/" . $videoId ;
    if ( ! is_dir($path)) {
      mkdir($path);
    }
    move_uploaded_file($file["tmp_name"], $path . "/" . basename("video.") . pathinfo($file["name"], PATHINFO_EXTENSION));

    return "uploads/videos" . $videoId . "/" . basename($file["name"]);
  }  

  if ($userId != null && $videoId != null && $file != null) {
    $thumbnailPath = processThumbnailUpload($file["thumbnail"], $userId, $videoId);
    $videoPath = processVideoUpload($file["video"], $userId, $videoId);
  }

?>