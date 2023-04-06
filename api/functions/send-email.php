<?php 
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';
 
  function sendVerifyEmail($email, $dbCon, $id) {
    $token = md5($email . "+" . random_int(0, 9999));
    $tokenRole = 1;

    $cm = "insert into users_token(userToken, userId, role) values(?, ?, ?)";
    $exec = $dbCon -> prepare($cm);
    $exec -> bind_param("sss", $token, $id, $tokenRole);
    $exec -> execute();

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
      $mail->Body    = 'https://localhost/web-lastsem-be/activate-account.php?token=' . $token;
  
      $mail->send();
      return true;
    } catch (Exception $e) {
      //  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      return false;
    }
  }
  
?>