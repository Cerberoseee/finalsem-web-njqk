<?php 

  function verifyToken($token, $dbCon) {
    $cm = "select * from users_token where userToken = ?";
    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("s", $token);
    if (!$exec -> execute()) {
      die(json_encode(array("status" => false, "data" => "Executed failed")));
    }

    $res = $exec -> get_result();

    if ($res -> num_rows == 0) {
      return null;
    }

    $data = $res -> fetch_assoc();
    return $data;
  }

  function deleteToken($token, $dbCon) {
    $cm = "delete from users_token where userToken = ?";
    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("s", $token);
    if (!$exec -> execute()) {
      return false;
    }
    return true;
  }

  function activateUser($token, $dbCon) {
    $now = time();

    $data = verifyToken($token, $dbCon);
    if ($data == null) return false;
    
    if ($data["role"] == 2) return false;

    $userId = $data["userId"];
    $activated = false;
    $createTime = strtotime( $data["createdAt"] );
    if ($now - $createTime < 300) {
      $activated = true;
      $cm = "update users_account set status = 'active' where userId = ?";
      $exec = $dbCon -> prepare($cm);
      $exec -> bind_param("s", $userId);
      if (!$exec -> execute()) {
        die(json_encode(array("status" => false, "data" => "Executed failed")));
      }
    } 

    if (!deleteToken($token, $dbCon)) {
      die(json_encode(array("status" => false, "data" => "Executed failed")));
    }

    return $activated;
  }

  function forgotPassword($token, $newPassword, $dbCon) {
    $now = time();

    $data = verifyToken($token, $dbCon);
    if ($data == null) return false;
    
    if ($data["role"] != 2) return false;

    $userId = $data["userId"];
    $changed = false;
    $createTime = strtotime($data["createdAt"]);

    if ($now - $createTime < 300) {
      $changed = changePassword($newPassword, $userId, $dbCon);
    }

    if (!deleteToken($token, $dbCon)) {
      die(json_encode(array("status" => false, "data" => "Executed failed")));
    }

    return $changed;
  }

  function changePassword($newPassword, $userId, $dbCon) {
    $hashed = password_hash($newPassword, PASSWORD_DEFAULT);
    $cm = "update users set password = ? where userId = ?";
    
    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("ss", $hashed, $userId);

    if (!$exec -> execute()) {
      return false;
    }

    return true;
  }
?>