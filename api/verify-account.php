<?php 

  require_once("db-connection.php");
  require_once("functions/send-email.php");

  $email = isset($_POST["email"]) ? $_POST["email"] : null;

  if ($email == null) {

  }
?>