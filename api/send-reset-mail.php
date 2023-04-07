<?php 

  require_once("db-connection.php");
  require_once("functions/send-email.php");

  $email = isset($_POST["email"]) ? $_POST["email"] : null;

  if ($email != null) {
    if (sendResetEmail($email, $dbCon)) {
      echo json_encode(array("status" => true));
    } else {
      echo json_encode(array("status" => false));
    }
  } else {
    die(json_encode(array("status" => false, "data" => array( "keyword" => "noParam", "content" => "No parameter found"))));
  }
?>