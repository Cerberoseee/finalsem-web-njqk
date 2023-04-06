<?php 
  require_once("db-connection.php");
  require_once("functions/manage-account.php");
  
  $token = isset($_POST["token"]) ? $_POST["token"] : null;

  if ($token != null) {
    if (!activateUser($token, $dbCon)) {
      die(json_encode(array("status" => "false", array( "keyword" => "activeFail", "content" => "Activated failed"))));
    } else {
      echo json_encode(array("status" => "true", "data" => array( "keyword" => "activeSuccess", "content" => "Activated success")));
    }
  } else {
    die(json_encode(array("status" => "false", "data" => array( "keyword" => "noParam", "content" => "No parameter found"))));
  }

?>