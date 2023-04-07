<?php 
  require_once("db-connection.php");
  require_once("functions/manage-account.php");
  
  $token = isset($_POST["token"]) ? $_POST["token"] : null;
  $newPassword = isset($_POST["password"]) ? $_POST["password"] : null;

  if ($token != null || $newPassword != null) {
    if (!forgotPassword($token, $newPassword, $dbCon)) {
      die(json_encode(array("status" => "false", array( "keyword" => "changeFail", "content" => "Password changed failed"))));
    } else {
      echo json_encode(array("status" => "true", "data" => array( "keyword" => "changeSuccess", "content" => "Password changed success")));
    }
  } else {
    die(json_encode(array("status" => "false", "data" => array( "keyword" => "noParam", "content" => "No parameter found"))));
  }

?>