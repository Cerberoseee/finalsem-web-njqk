<?php   
  /*
    Required Parameters: Follow by is the name of the field
    username: username
    password: password
  */

  require_once("db-connection.php");
  $data = file_get_contents("php://input");
  $account = json_decode($data, true);

  $email = isset($account["email"]) ? $account["email"] : null;
  $password = isset($account["password"]) ? $account["password"] : null;


  if($email != null && $password != null) {
    $cm = "SELECT * FROM users where email = ?";
    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("s", $email);

    //In case of execution failed
    if (!$exec -> execute()) {
      die(json_encode(array("status" => false, "data" => "Execute query failed")));
    }

    //Fetch data from database
    $result = $exec -> get_result();
    $data = $result -> fetch_assoc();

    //In case of no username found
    if (!$data) {
      die(json_encode(array("status" => false, "data" => "No user found or wrong password")));
    } 

    //Verify login with hashed password
    $encrypted_password = $data["password"];
    if(!password_verify($password, $encrypted_password)) {
      die(json_encode(array("status" => false, "data" => "No user found or wrong password")));
    }
    
    //Return true to the login

    session_start();
    $_SESSION["account"] = _info($data["userId"], $dbCon);
    echo json_encode(array("status" => true, "data" => $_SESSION["account"]));

  }
  else {
    //No parameter is provided or not enough
    die(json_encode(array("status" => false, "data" => "Not enough paramaters")));
  }

  // Get information of user by id
  function _info($id, $dbCon){
    $account = [];
    // Get data from users table
    $cm = "SELECT * FROM users where userId = ?";
    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("s", $id);

    if (!$exec -> execute()) {
      die(json_encode(array("status" => false, "data" => "Execute query failed")));
    }

    $result = $exec -> get_result();
    $data = $result->fetch_assoc();
    unset($data["password"]);
    $account = $data;
    // Get data from users table
    $cm = "SELECT * FROM users_account where userId = ?";
    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("s", $id);
    if (!$exec -> execute()) {
      die(json_encode(array("status" => false, "data" => "Execute query failed")));
    }

    $result = $exec -> get_result();
    $data = $result->fetch_assoc();
    unset($data["userId"]);
    $account += $data;

    // Get data from users_info table
    $cm = "SELECT * FROM users_info where userId = ?";
    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("s", $id);
    if (!$exec -> execute()) {
      die(json_encode(array("status" => false, "data" => "Execute query failed")));
    }

    $result = $exec -> get_result();
    $data = $result->fetch_assoc();
    unset($data["userId"]);
    $account += $data;

    return $account;
  }
?>