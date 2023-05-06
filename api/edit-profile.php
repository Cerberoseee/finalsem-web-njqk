<?php 
  $userid = isset($_POST["userId"]) ? $_POST["userId"] : null;
  $avatar = isset($_FILES["avatar"]) ? $_FILES["avatar"] : null;
  $background = isset($_FILES["background"]) ? $_FILES["background"] : null;
  $channelName = isset($_POST["channelName"]) ? $_POST["channelName"] : null;
  $username = isset($_POST["username"]) ? $_POST["username"] : null;
  $bio = isset($_POST["bio"]) ? $_POST["bio"] : null;
  $about = isset($_POST["about"]) ? $_POST["about"] : null;
  $email = isset($_POST["email"]) ? $_POST["email"] : null;
  $gender = isset($_POST["gender"]) ? $_POST["gender"] : null;
  $dob = isset($_POST["dob"]) ? $_POST["dob"] : null;
  $location = isset($_POST["location"]) ? $_POST["location"] : null;

  function processPath($file, $userid, $filename) {
    $path = "../assets/profile/". $userid;
    if ( ! is_dir($path)) {
      mkdir($path, 0777, true);
    }
    
    move_uploaded_file($file["tmp_name"], $path . "/" . basename($filename) . "." . pathinfo($file["name"], PATHINFO_EXTENSION));

    return "assets/profile/" . $userid . "/" .basename($filename) . "." . pathinfo($file["name"], PATHINFO_EXTENSION);
  }

  if ($avatar != null && $background != null && $channelName != null 
    && $username != null && $bio != null && $about != null 
    && $email != null && $gender != null && $dob != null && $location != null) {
      $avatarPath = processPath($avatar, $userid, "avatar");
      $backgroundPath = processPath($background, $userid, "background");

      $cm = "UPDATE users_account 
        SET channelName = ?, 
        bio = ?, 
        avatarPath = ?, 
        about = ?, 
        gender = ?, 
        location = ?, 
        backgroundPath = ?
      WHERE userId = ?";

      $exec = $dbCon->prepare($cm);
      $exec->bind_param("ssssssss", $channelName, $bio, $avatarPath, $about, $gender, $location, $backgroundPath, $userid);
      $exec->execute();
      $error = $exec->error;
      if ($error) {
        die("Error: " . $error);
      } 

      $cm = "UPDATE users_info
        SET dateOfBirth = ?
      WHERE userId = ?";

      $exec = $dbCon->prepare($cm);
      $exec->bind_param("ss", $dob, $userid);
      $exec->execute();
      $error = $exec->error;
      if ($error) {
        die("Error: " . $error);
      }
  } 
?>