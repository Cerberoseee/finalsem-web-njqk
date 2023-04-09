<?php 
  function checkUsername( $dbCon, $username) {
    $cm = "select * from users_account where username = ?";
    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("s", $username);

    //In case of execution failed
    if (!$exec -> execute()) {
      die(json_encode(array("status" => false, "data" => "Execute query failed")));
    }

    //Fetch data from database
    $result = $exec -> get_result();
    $data = $result -> fetch_assoc();

    if ($data) {
      return true;
    } 
    return false;
  }

  function checkEmail( $dbCon, $email) {
    $cm = "select * from users where email = ?";
    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("s", $email);

    //In case of execution failed
    if (!$exec -> execute()) {
      die(json_encode(array("status" => false, "data" => "Execute query failed")));
    }

    //Fetch data from database
    $result = $exec -> get_result();
    $data = $result -> fetch_assoc();

    if ($data) {
      return true;
    } 
    return false;
  }

  function checkPhoneNumber( $dbCon, $phoneNumber) {
    $cm = "select * from users_info where phoneNumber = ?";
    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("s", $phoneNumber);

    //In case of execution failed
    if (!$exec -> execute()) {
      die(json_encode(array("status" => false, "data" => "Execute query failed")));
    }

    //Fetch data from database
    $result = $exec -> get_result();
    $data = $result -> fetch_assoc();

    if ($data) {
      return true;
    } 
    return false;
  }
?>