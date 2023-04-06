<?php   
  /*
    Required Parameters: Follow by is the name of the field
    username: username
    password: password
  */

  require_once("db-connection.php");

  $username = isset($_POST["username"]) ? $_POST["username"] : null;
  $password = isset($_POST["password"]) ? $_POST["password"] : null;

  if($username != null && $password != null) {
    $cm = "select * from users where username = ?";
    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("s", $username);

    //In case of execution failed
    if (!$exec -> execute()) {
      die(json_encode(array("status" => false, "data" => "Execute query failed")));
    }

    //Fetch data from database
    $result = $exec -> get_result();
    $data = $result -> fetch_assoc();

    //In case of no username found
    if (!$data) {
      die(json_encode(array("status" => false, "data" => "No user found")));
    } 


    //Verify login with hashed password
    $encrypted_password = $data["password"];
    if(!password_verify($password, $encrypted_password)) {
      die(json_encode(array("status" => false, "data" => "Wrong password")));
    }
    
    //Return true to the login
    echo json_encode(array("status" => true, "data" => "success"));

  }
  else {
    //No parameter is provided or not enough
    die(json_encode(array("status" => false, "data" => "Not enough paramaters")));
  }
?>