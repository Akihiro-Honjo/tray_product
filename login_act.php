<?php
session_start();
include('functions.php');



$mail_address = $_POST['mail_address'];
$password = $_POST['password'];

// var_dump($_POST);
// exit();

$pdo = connect_to_db();

$sql = 'SELECT * FROM user_table WHERE mail_address=:mail_address AND password=:password AND deleted_at IS NULL';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':mail_address', $mail_address, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
  echo "<p>ログイン情報に誤りがあります</p>";
  echo "<a href=todo_login.php>ログイン</a>";
  exit();
} else {
  $_SESSION = array();
  $_SESSION['user_id'] = $user['id'];
  $_SESSION['session_id'] = session_id();
  $_SESSION['is_admin'] = $user['is_admin'];
  $_SESSION['mail_address'] = $user['mail_address'];
  header("Location:tray_read.php");
  exit();
}
