<?php
include('functions.php');

// 画像アップロード処理
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
  // ファイルを保存するディレクトリ
  $uploadPath = 'uploads/';
  // アップロードされたファイル名
  $fileName = basename($_FILES['image']['name']);
  // 保存するファイルパス
  $uploadFilePath = $uploadPath . $fileName;

  // ファイルタイプの検証 (ここでは例としてJPEG, PNGのみ許可)
  $allowedTypes = array(IMAGETYPE_JPEG, IMAGETYPE_PNG);
  $detectedType = exif_imagetype($_FILES['image']['tmp_name']);
  if (!in_array($detectedType, $allowedTypes)) {
      echo json_encode(["error_msg" => "Invalid file type"]);
      exit;
  }

  // ファイルを指定したディレクトリに移動
  if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadFilePath)) {
      echo json_encode(["error_msg" => "Failed to upload file"]);
      exit;
  }

  // データベースにはファイルパスを保存
  $image = $uploadFilePath;
} else {
  echo json_encode(["error_msg" => "No file uploaded"]);
  exit;
}


if (
  !isset($_POST['maker']) || $_POST['maker'] === '' ||
  !isset($_POST['product']) || $_POST['product'] === '' 
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

// var_dump($_POST);
// exit();


$maker = $_POST["maker"];
$category = $_POST["category"];
$product = $_POST["product"];
$purpose = $_POST["purpose"];

$pdo = connect_to_db();

// $sql = 'SELECT COUNT(*) FROM tray_table WHERE product=:product';

// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':product', $product, PDO::PARAM_STR);

// try {
//   $status = $stmt->execute();
// } catch (PDOException $e) {
//   echo json_encode(["sql error" => "{$e->getMessage()}"]);
//   exit();
// }

// if ($stmt->fetchColumn() > 0) {
//   echo "<p>すでに登録されている商品です．</p>";
//   echo '<a href="todo_login.php">login</a>';
//   exit();
// }

$sql = 'INSERT INTO tray_table(id, maker, category, image, product, purpose, created_at, updated_at) VALUES(NULL, :maker, :category, :image, :product, :purpose, now(), now())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':maker', $maker, PDO::PARAM_STR);
$stmt->bindValue(':category', $category, PDO::PARAM_STR);
$stmt->bindValue(':image', $image, PDO::PARAM_STR);
$stmt->bindValue(':product', $product, PDO::PARAM_STR);
$stmt->bindValue(':purpose', $purpose, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:login.php");
exit();
