<?php
require_once 'helper.php';
require_once 'read.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (isset($_POST)) {
    $firstName = $_POST['first_Name'];
    $lastName = $_POST['last_Name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conPassword = $_POST['confirm_password'];

    if (blankCk($firstName) && blankCk($lastName) && blankCk($email) && blankCk($password) && blankCk($conPassword)) {
      if (isset($_FILES)) {
        $imageInfo = imageValidation($_FILES);
        if ($imageInfo) {
          //ck is email exists
          $emailSearch = readData('users', ['email'], 'email', "'{$email}'");

          if (count($emailSearch)) {
            echo $email . ' allready exists';
            exit();

          } else {
            // $code = rand_rang(4);
            $code = rand_rang(4);
            $_SESSION['email_code'] = md5($code);

            if (emailSend($email, $code) === 'email send success') {
              $_SESSION['user_info'] = [$firstName, $lastName, $email, $password, $imageInfo];
              echo 'confirmation';
            }
          }
        }
      } else {
        echo 'Image is required';
      }
    } else {
      echo 'wrong';
    }
  }
}
?>