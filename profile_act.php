<?php
include('functions.php');

// var_dump($_POST);
// exit();

if (
  !isset($_POST['name']) || $_POST['name'] === '' ||
  !isset($_POST['post_number']) || $_POST['post_number'] === '' ||
  !isset($_POST['address']) || $_POST['address'] === '' ||
  !isset($_POST['tel']) || $_POST['tel'] === '' ||
  !isset($_POST['company']) || $_POST['company'] === '' 
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}


$name = $_POST["name"];
$post_number = $_POST["post_number"];
$address = $_POST["address"];
$tel = $_POST["tel"];
$company = $_POST["company"];

$pdo = connect_to_db();

// $sql = 'SELECT COUNT(*) FROM user_table WHERE mail_address=:mail_address';

// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':mail_address', $mail_address, PDO::PARAM_STR);

// try {
//   $status = $stmt->execute();
// } catch (PDOException $e) {
//   echo json_encode(["sql error" => "{$e->getMessage()}"]);
//   exit();
// }

// if ($stmt->fetchColumn() > 0) {
//   echo "<p>すでに登録されているユーザです．</p>";
//   echo '<a href="todo_login.php">login</a>';
//   exit();
// }

$sql = 'INSERT INTO profile_table(id, name, post_number, address, company, tel, created_at) VALUES(NULL, :name, :post_number, :address, :tel, :company,  now())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':post_number', $post_number, PDO::PARAM_STR);
$stmt->bindValue(':address', $address, PDO::PARAM_STR);
$stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
$stmt->bindValue(':company', $company, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:login.php");
exit();
