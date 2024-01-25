<?php
include('functions.php');

// var_dump($_POST);
// exit();

if (
  !isset($_POST['mail_address']) || $_POST['mail_address'] === '' ||
  !isset($_POST['password']) || $_POST['password'] === ''
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}


$mail_address = $_POST["mail_address"];
$password = $_POST["password"];

$pdo = connect_to_db();

$sql = 'SELECT COUNT(*) FROM user_table WHERE mail_address=:mail_address';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':mail_address', $mail_address, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

if ($stmt->fetchColumn() > 0) {
  echo "<p>すでに登録されているユーザです．</p>";
  echo '<a href="todo_login.php">login</a>';
  exit();
}

$sql = 'INSERT INTO user_table(id, mail_address, password, is_admin, created_at, updated_at, deleted_at) VALUES(NULL, :mail_address, :password, 0, now(), now(), NULL)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':mail_address', $mail_address, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:login.php");
exit();
