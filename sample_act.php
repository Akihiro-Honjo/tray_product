<?php

// var_dump($_GET);
// exit();

session_start();
include("functions.php");
check_session_id();

$user_id = $_GET['user_id'];
$product_id = $_GET['product_id'];

$pdo = connect_to_db();

$sql = 'INSERT INTO sample_table(id, user_id, product_id, created_at) VALUES(NULL, :user_id, :product_id, now())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':product_id', $product_id, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
  } catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
  }
  
  header("Location:tray_read.php");
  exit();