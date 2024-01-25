<?php
session_start();
include("functions.php");
check_session_id();

$user_id = $_SESSION['user_id'];

$pdo = connect_to_db();


$sql = 'SELECT * FROM tray_table WHERE ';


$conditions = [];
$params = [];

// カテゴリー
if (isset($_GET['category']) && $_GET['category'] != '') {
    $conditions[] = 'category = :category';
    $params[':category'] = $_GET['category'];
}

// メーカー
if (isset($_GET['maker']) && $_GET['maker'] != '') {
    $conditions[] = 'maker LIKE :maker';
    $params[':maker'] = '%' . $_GET['maker'] . '%';
}

// 商品名
if (isset($_GET['product']) && $_GET['product'] != '') {
  $conditions[] = 'product LIKE :product';
  $params[':product'] = '%' . $_GET['product'] . '%';
}
// 用途
if (isset($_GET['purpose']) && $_GET['purpose'] != '') {
  $conditions[] = 'purpose LIKE :purpose';
  $params[':purpose'] = '%' . $_GET['purpose'] . '%';
}


if (!empty($conditions)) {
    $sql .= implode(' OR ', $conditions);
} else {

    $sql = rtrim($sql, ' WHERE ');
}

$sql .= ' ORDER BY category ASC';

$stmt = $pdo->prepare($sql);

try {
  // Pass the parameters array to the execute() function
  $status = $stmt->execute($params);
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// var_dump($_GET);
// exit();

// $pdo = connect_to_db();

// $sql = 'SELECT * FROM tray_table ORDER BY category ASC';

// $stmt = $pdo->prepare($sql);

// try {
//   $status = $stmt->execute();
// } catch (PDOException $e) {
//   echo json_encode(["sql error" => "{$e->getMessage()}"]);
//   exit();
// }

// カテゴリー配列
$categoryMap = [
  "A" => "鮮魚",
  "B" => "塩干",
  "C" => "寿司",
  "D" => "精肉",
  "E" => "米飯",
  "F" => "惣菜",
  "G" => "青果",
  "H" => "汎用",
];


$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
foreach ($result as $record) {
  $categoryName = isset($categoryMap[$record["category"]]) ? $categoryMap[$record["category"]] : "不明";
  $output .= "
    <tr>
    <td><img src='{$record["image"]}' alt='Product Image' style='width:100px;'></td>
      <td>{$record["product"]}</td>
      <td><a href='sample_act.php?user_id={$user_id}&product_id={$record["id"]}'>sample</a></td>
      <td>{$record["maker"]}</td>
      <td>{$categoryName}</td>
      <td>{$record["purpose"]}</td>
    </tr>
  ";
}

?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>一覧画面）</title>
  <style>
  body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f4f4f4;
  }
  fieldset {
    border: 1px solid #ddd;
    background-color: #fff;
    border-radius: 5px;
    padding: 20px;
  }
  legend {
    font-size: 1.4em;
    font-weight: bold;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }
  table, th, td {
    border: 1px solid #ccc;
  }
  th, td {
    text-align: left;
    padding: 8px;
  }
  th {
    background-color: #eee;
  }
  tr:nth-child(even) {
    background-color: #f9f9f9;
  }
  img {
    width: 100px; 
    height: auto;
    border-radius: 5px; 
  }
</style>

</head>

<body>
  <h1>一覧画面</h1>
  <a href="user_sample.php">サンプル</a>
  <form action="" method="GET">
  <select name="category">
    <option value="">カテゴリー</option>
    <option value="A">鮮魚</option>
    <option value="B">塩干</option>
    <option value="C">寿司</option>
    <option value="D">精肉</option>
    <option value="E">米飯</option>
    <option value="F">惣菜</option>
    <option value="G">青果</option>
    <option value="H">汎用</option>
    </select> 
    <input type="text" name="maker" placeholder="メーカー名">
    <input type="text" name="product" placeholder="商品名">
    <input type="text" name="purpose" placeholder="用途">
    <input type="submit" value="絞り込む">
  <fieldset>
    <table>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>