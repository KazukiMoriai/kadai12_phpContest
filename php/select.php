<?php
// DB接続
include("dbConnect.php");

// データ取得
$stmt = $pdo->prepare("SELECT * FROM carall"); 
$stmt->execute();

// $valuesのグローバル化
global $values; 
$values = $stmt->fetchAll(PDO::FETCH_ASSOC); 

?>