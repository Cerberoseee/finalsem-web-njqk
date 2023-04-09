<?php 
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';
 
  function sendVerifyEmail($email, $dbCon) {
    $cm = "select * from users where email = ?";
    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("s", $email);
    if (!$exec -> execute()) {
      die(json_encode(array("status" => "false", "error" => array("keyword" => "queryFailed", "content" => "Query email on sendVerifyEmail failed"))));
    }

    $res = $exec -> get_result();
    if ($res -> num_rows == 0) {
      return false;
    }
    $data = $res -> fetch_assoc();
    $id = $data["userId"];

    $token = md5($email . "+" . uniqid());
    $tokenRole = 1;

    $cm = "insert into users_token(userToken, userId, role) values(?, ?, ?)";
    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("sss", $token, $id, $tokenRole);
    if (!$exec -> execute()) {
      die(json_encode(array("status" => "false", "error" => array("keyword" => "execFailed", "content" => "Insert token on sendVerifyEmail failed"))));
    }

    $mail = new PHPMailer(true);

    try {
      //Server settings
      // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
      $mail->isSMTP();                                            
      $mail->Host       = 'smtp.gmail.com';                       
      $mail->SMTPAuth   = true;                                   
      $mail->Username   = 'wibutapcode.dev@gmail.com';                            // SMTP username (Google Application Username)
      $mail->Password   = 'uxxafjxjpgksspic';                                     // SMTP password (Google Application Password)
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
      $mail->Port       = 587;                                    
  
      //Recipients
      $mail->setFrom('admin@gmail.com', 'Admin');
      $mail->addAddress($email);

      // Content
      $mail->isHTML(true);

      //Template email here
      $mail->Subject = 'Verify Email';
      $mail->Body    = 'https://localhost/finalsem-web-njqk/api/activate-mail.php?token=' . $token; 
  
      $mail->send();
      return true;
    } catch (Exception $e) {
      //  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      return false;
    }
  }

  function sendResetEmail($email, $dbCon) {
    $cm = "select * from users_account acc inner join users_info inf where inf.email = ?";
    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("s", $email);
    if (!$exec -> execute()) {
      die(json_encode(array("status" => "false", "error" => array("keyword" => "queryFailed", "content" => "Query email on sendVerifyEmail failed"))));
    }

    $res = $exec -> get_result();
    if ($res -> num_rows == 0) {
      return false;
    }
    $data = $res -> fetch_assoc();
    $id = $data["userId"];

    $token = md5($email . "+" . uniqid());
    $tokenRole = 2;

    $cm = "insert into users_token(userToken, userId, role) values(?, ?, ?)";
    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("sss", $token, $id, $tokenRole);
    if (!$exec -> execute()) {
      die(json_encode(array("status" => "false", "error" => array("keyword" => "execFailed", "content" => "Insert token on sendVerifyEmail failed"))));
    }

    $mail = new PHPMailer(true);

    try {
      //Server settings
      // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
      $mail->isSMTP();                                            
      $mail->Host       = 'smtp.gmail.com';                       
      $mail->SMTPAuth   = true;                                   
      $mail->Username   = 'wibutapcode.dev@gmail.com';                            // SMTP username (Google Application Username)
      $mail->Password   = 'uxxafjxjpgksspic';                                     // SMTP password (Google Application Password)
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
      $mail->Port       = 587;                                    
  
      //Recipients
      $mail->setFrom('admin@gmail.com', 'Admin');
      $mail->addAddress($email);

      // Content
      $mail->isHTML(true);

      //Template email here
      $mail->Subject = 'Reset Password Email';
      $mail->Body    = 'https://localhost/finalsem-web-njqk/test.php?token=' . $token; 
  
      $mail->send();
      return true;
    } catch (Exception $e) {
      //  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      return false;
    }
  }
  
?>