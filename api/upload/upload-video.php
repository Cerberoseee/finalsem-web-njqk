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

    return "uploads/videos/" . $videoId . "/" .basename("video.") . pathinfo($file["name"], PATHINFO_EXTENSION);
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
    $likes = 0;
    $dislikes = 0;
    $status = "active";
    $restric = intval($ageRestricted);
    //SQL Execution here

    $cm = "INSERT INTO video VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $exec = $dbCon->prepare($cm);
    $exec->bind_param("sssissiisssi", $videoId, $title, $description, $views, $thumbnailPath, $tags, $likes, $dislikes, $uploadTime, $status, $videoPath, $restric);
    $exec->execute();
    $error = $exec->error;
    if ($error) {
        echo "Error: " . $error;
    } else {
        $result = $exec->get_result();
        // do something with the result
        echo json_encode(array("status" => true, "header" =>
          array("content" => "Upload sucessfully", "id"=> $videoId)
        ));
    }


    
    //unlink("../../uploads/videos/temp/" . $userId . "/" . basename("video.") . pathinfo($file["video"]["name"], PATHINFO_EXTENSION));
    
  }

?>