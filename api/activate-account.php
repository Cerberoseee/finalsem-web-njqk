<?php 
  require_once("db-connection.php");
  require_once("functions/activate-account.php");
  
  $token = isset($_GET["token"]) ? $_GET["token"] : null;

  if ($token != null) {
    if (!activateUser($token, $dbCon)) {
      die(json_encode(array("status" => "false", "data" => "Activated failed")));
    } else {
      echo json_encode(array("status" => "true", "data" => "Activated success"));
    }
  } else {
    die(json_encode(array("status" => "false", "data" => "No parameter found")));
  }

?>