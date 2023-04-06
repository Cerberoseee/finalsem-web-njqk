<?php 
  function activateUser($token, $dbCon) {
    $now = time();

    $cm = "select * from users_token where userToken = ?";
    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("s", $token);
    if (!$exec -> execute()) {
      die(json_encode(array("status" => false, "data" => "Executed failed")));
    }

    $res = $exec -> get_result();

    if ($res -> num_rows == 0) {
      return false;
    }

    $data = $res -> fetch_assoc();
    $userId = $data["userId"];

    if ($data['tokenRole'] == 2) return false;

    $activated = false;
    $createTime = strtotime( $data["createdAt"] );
    if ($now - $createTime < 300) {
      $activated = true;
      $cm = "update users_account set status = 'active' where userId = ?";
      $exec = $dbCon -> prepare($cm);
      $exec -> bind_param("s", $userId);
      if (!$exec -> execute()) {
        die(json_encode(array("status" => "false", "data" => "Executed failed")));
      }
    } 

    $cm = "delete from users_token where userToken = ?";
    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("s", $token);
    if (!$exec -> execute()) {
      die(json_encode(array("status" => "false", "data" => "Executed failed")));
    }

    return $activated;
  }

  function changePassword($userId, $newPassword) {
    
  }
?>