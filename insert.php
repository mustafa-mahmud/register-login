<?php
function insertData($table, $cols, $vals) {
  require_once 'config.php';
  require_once 'read.php';

  $sql = "INSERT INTO {$table} (" . implode(',', $cols) . ") VALUES (" . implode(',', $vals) . ")";

  $stmt = $conn->prepare($sql);
  $stmt->execute();

  if ($stmt->rowCount()) {
    $_SESSION['user_id'] = $conn->lastInsertId();
    return 'success';
  } else {
    return 'sorry data not able to insert in DB';
  }
}

?>