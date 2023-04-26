<?php 
  require_once("db-connection.php");
  $file = isset($_FILES) ? $_FILES : null;
  $userId = isset($_POST["userId"]) ? $_POST["userId"] : null;


  function processVideoUpload($file, $userId) {
    $path = "../uploads/videos/temp" . $userId ;
    if ( ! is_dir($path)) {
      mkdir($path);
    }
    move_uploaded_file($file["tmp_name"], $path . "/" . basename("video.") . pathinfo($file["name"], PATHINFO_EXTENSION));

    return "uploads/videos/temp/" . $userId . "/" . basename($file["name"]);
  } 

  if ($file != null && $userId != null) {
    $path = processVideoUpload($file, $userId);
    echo json_encode(array("status" => "true", "content" => array("path" => $path)));
  }

  
?>