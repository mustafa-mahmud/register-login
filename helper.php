<?php
use PHPMailer\PHPMailer\PHPMailer;

function imageValidation($img) {
  $name = $img['image']['name'];
  $type = $img['image']['type'];
  $tmpName = $img['image']['tmp_name'];
  $size = $img['image']['size'];
  $upload = 'assets/profile/';
  $correct = ['jpg', 'jpeg', 'png', 'gif'];

  $userType = explode('/', $type);
  $userType = end($userType);
  $userType = strtolower($userType);

  if (in_array($userType, $correct)) {
    if ($size > 3000000) {
      echo 'Image size must be in 3mbs';
    } else {
      $newName = time();
      $newName = md5($newName);
      $newName = $newName . '_' . $name;

      if (move_uploaded_file($tmpName, $upload . $newName)) {
        return $newName;
      } else {
        echo 'Someting went wrong to upload image.';
      }
    }

  } else {
    return false;
  }
}

function blankCk($value) {
  if (!$value) {
    return false;
  } else {
    return true;
  }
}

function passwordMatch($pass1, $pass2) {
  if ($pass1 === $pass2) {
    return true;
  } else {
    return false;
  }
}

function emailValidation($email) {
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return true;
  } else {
    return false;
  }
}

function rand_rang($many) {
  $getNums = [];

  for ($i = 0; $i < $many; $i++) {
    $getNums[] = rand(0, 9);
  }

  return implode('', $getNums);
}

function emailSend($email, $code) {

  //info:: THIS EMAIL ONLY WORK IN 'LOCALHOST' WITH 'GMAIL'
  require_once 'PHPMailer/PHPMailer.php';
  require_once 'PHPMailer/SMTP.php';
  require_once 'PHPMailer/Exception.php';

  $mail = new PHPMailer();

  //smtp settings
  $mail->isSMTP(); //if you send by the live server, delete this line,it is only for localhost
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'YOUR GMAIL HERE';
  $mail->Password = 'YOUR GMAIL PASSWORD HERE';
  $mail->Port = 465;
  $mail->SMTPSecure = 'ssl';

  //email settings
  $mail->isHTML(true);
  $mail->setFrom('mithuweb000@gmail.com', 'Register Verify');
  $mail->addAddress($email);
  $mail->Subject = ("CONFIRMAION");
  $mail->Body = "Your 4 digit code is " . $code;

  if ($mail->send()) {
    $response = 'email send success';
  } else {
    $response = 'Something went wrong: <br/>' . $mail->ErrorInfo;
  }

  return $response;

  return 'email send success';
}

?>
