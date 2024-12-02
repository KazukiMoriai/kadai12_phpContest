<?php
// DB接続
require_once("funcs.php");
$pdo = db_connect();

// データ取得
$stmt = $pdo->prepare("SELECT * FROM carall"); 
$stmt->execute();

// $valuesのグローバル化
global $values; 
$values = $stmt->fetchAll(PDO::FETCH_ASSOC); 

?>