<?php 
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';
  require_once '../components/layout.php';
  function sendVerifyEmail($email, $dbCon) {
    $url = $_SESSION["url"];

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
      $mail->Body    = `
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Verify Email</title>
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;600&display=swap');
                *{
                    padding: 0;
                    margin: 0;
                }
                .wrapper{
                    background-color: #2D2F3C;
                    max-width: 500px;
                    color: white;
                    border-radius: 12px;
                    padding: 24px;
                    text-align: center;
                    font-family: 'Rubik', sans-serif;
                }
                .wrapper > .spcxza,
                .wrapper > .imgscvx,
                .wrapper > .spyxcv,
                .wrapper > .acvswbvl
                {
                    margin: 0.5rem 0;
                }
                .d-block{display: block;}
                .acvswbvl{
                    text-decoration: none;
                    color: white;
                    background-color: #2B4F90;
                    padding: 1rem 2rem;
                    border-radius: 12px;
                    width: 200px;
                    display: block;
                    margin: 1rem auto !important;
                }
                .acvswbvl:hover{
                    background-color: #45AEFF;
                }
                .smavcb{
                    color: #8899A6;
                }
                .spcxza{
                    color: #45AEFF;
                    font-size: 24px;
                }
            </style>
        </head>
        <body>
            <div class="wrapper">
                <h3>WIBUTAP</h3>
                <span class="d-block spcxza">Thanks for signing up for Wibutap!</span>
                <img class="imgscvx" src="https://dl.dropbox.com/s/ui7u871d38wf52v/email-icon.svg" alt="">
                <span class="d-block spyxcv">Just one more step. Let’s get your email address verified:</span>
                <a href="`. "$url/register.php?confirm=$token" .`" class="d-block acvswbvl">Click to verify Email</a>
                <small class="smavcb">This link will expire in 30 minutes. If you did not make this request, please disregard this email.</small>
            </div>
        </body>
        </html>
      `;
  
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
      $server = $_SERVER['SERVER_ADRR'];
      //Recipients
      $mail->setFrom('admin@gmail.com', 'Admin');
      $mail->addAddress($email);

      // Content
      $mail->isHTML(true);

      //Template email here
      $url = $_SESSION["url"];
      $mail->Subject = 'Reset Password Email';
      $mail->Body    = "https://$server/finalsem-web-njqk/test.php?token=" . $token;  
  
      $mail->send();
      return true;
    } catch (Exception $e) {
      //  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      return false;
    }
  }
  
?>