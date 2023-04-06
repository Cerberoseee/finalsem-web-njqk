<?php 

  /*
    Required Parameters: Follow by is the name of the field
    username: username
    password: password
    full name of the user: fullName
    email: email
    phone number: phone
    date of birth: dob
  */

  
  require_once("db-connection.php");
  require_once("functions/send-email.php");
  require_once("functions/check-field.php");

  $username = isset($_POST["username"]) ? $_POST["username"] : null;
  $password = isset($_POST["password"]) ? password_hash($_POST["password"], PASSWORD_DEFAULT) : null;
  $fullName = isset($_POST["fullName"]) ? $_POST["fullName"]: null;
  $email = isset($_POST["email"]) ? $_POST["email"] : null;
  $phoneNumber = isset($_POST["phone"]) ? $_POST["phone"] : null;
  $dOb = isset($_POST["dob"]) ? $_POST["dob"] : null;
  $role = "user";
  $status = "verify";
  $tokenRole = 1; //1 activate account 2 reset password  

  if ($username != null && $fullName != null && $password != null && $email != null && $phoneNumber != null && $dOb != null) {
    //This function to create numeric unique ID for each user
    //uniqid() is used for creating a unique string id base of epoch time
    //crc32() is used to convert the ID to numeric
    $id = crc32(uniqid());
    $today = date("Y-m-d");
    $hashed = password_hash($password, PASSWORD_BCRYPT);
    $defaultAvatarPath = "/assets/default/avatar.jpeg";

    $existed = [];

    //Checking existed information
    if (checkUsername($dbCon, $username)) {
      array_push($existed, array( "error" => "userExisted", "content" => "username is taken"));
    } 

    if (checkEmail($dbCon, $email)) {
      array_push($existed, array( "error" => "mailExisted", "content" => "email is taken"));
    } 

    if (checkPhoneNumber($dbCon, $phoneNumber)) {
      array_push($existed, array( "error" => "phoneExisted", "content" => "phone is taken"));
    } 

    if (count($existed) > 0) {
      die(json_encode(array("status" => "false", "error" => $existed)));
    } 


    $dbCon -> begin_transaction();

    try {
      //Add entry to User table
      $cm = "insert into users values (?, ?, ?)";
      $exec = $dbCon -> prepare($cm);
      $exec -> bind_param("sss", $id, $username, $hashed);
      $exec -> execute();

      $cm = "insert into users_account values (?, ?, ?, ?, ?, ?)";
      $exec = $dbCon -> prepare($cm);
      $exec -> bind_param("ssssss", $id, $fullName, $today, $defaultAvatarPath, $role, $status);
      $exec -> execute();
      
      $cm = "insert into users_info values (?, ?, ?, ?, ?)";
      $exec = $dbCon -> prepare($cm);
      $exec -> bind_param("sssss", $id, $fullName, $email, $phoneNumber, $dOb);
      $exec -> execute();

      $dbCon -> commit();

    } catch (mysqli_sql_exception $exception) {
      $mysqli->rollback();
      die(json_encode(array("status" => false, "data" => "Execution failed")));
      // throw $exception;
    }

    if (sendVerifyEmail($email, $dbCon)) {
      echo json_encode(array("status" => true, "data" => array("register" => "success", "activate" => "false")));
    }

  } else {
    //No parameter is provided or not enough
    die(json_encode(array("status" => false, "data" => "Not enough paramaters")));
  }
?>