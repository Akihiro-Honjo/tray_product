<?php
session_start();
include("functions.php");
check_session_id();

$user_id = $_SESSION['user_id'];

$pdo = connect_to_db();

$sql = 'SELECT tray_table.*, COALESCE(count_table.sample_count, 0) AS sample_count FROM tray_table LEFT JOIN (SELECT product_id, COUNT(*) AS sample_count FROM sample_table GROUP BY product_id) AS count_table ON tray_table.id = count_table.product_id ORDER BY tray_table.category ASC';

$stmt = $pdo->prepare($sql);
try {
  $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}




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
    // カウントが1以上のレコードのみを出力
    if (isset($record["sample_count"]) && $record["sample_count"] > 0) {
        $categoryName = isset($categoryMap[$record["category"]]) ? $categoryMap[$record["category"]] : "不明";
        $output .= "
            <tr>
            <td><img src='{$record["image"]}' alt='Product Image' style='width:100px;'></td>
            <td>{$record["product"]}</td>
            <td>{$record["maker"]}</td>
            <td>{$categoryName}</td>
            </tr>
        ";
    }
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
    <input type="submit" value="絞り込む">
  <fieldset>
    <table>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
  <a href="send_sample.php">サンプル手配</a>
</body>

</html>