<?php
// DB接続
try {
    $pdo = new PDO('mysql:dbname=kadai09_bookmark;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DBConnectError: ' . $e->getMessage());
}

// データ取得
$stmt = $pdo->prepare("SELECT * FROM carall"); 
$stmt->execute();

// $valuesのグローバル化
global $values; 
$values = $stmt->fetchAll(PDO::FETCH_ASSOC); 

?>