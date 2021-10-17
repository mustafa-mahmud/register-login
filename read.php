<?php
if (!isset($_SESSION)) {
  session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $ck = json_decode(file_get_contents('php://input'));

  if (isset($ck[2])) {
    $email = $ck[0];
    $pass = $ck[1];

    emailPassCk($email, $pass);
    return;
  }
}

function emailPassCk($email, $pass) {
  if ($email && $pass) {
    $res = readData('users', ['*'], 'email', "'{$email}'");

    if ($res) {
      if ($res[0]['password'] === $pass) {
        $_SESSION['user_id'] = $res[0]['id'];
        echo 'success#' . $res[0]['image'];
      } else {
        echo 'Password is wrong';
      }
    } else {
      echo 'Email or Password is wrong';
    }
  }
}

function readData($table, $fields, $col = null, $condition = null) {
  include 'config.php';

  $sql = null;

  if ($col && $condition) {
    $sql = "SELECT " . implode(',', $fields) . " FROM {$table} WHERE {$col}={$condition}";
  }

  if (!$col && !$condition) {
    $sql = "SELECT " . implode(',', $fields) . " FROM {$table}";
  }

  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();

  return json_decode(json_encode($result), true);
}

?>