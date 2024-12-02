<?php
// DB接続
require_once("funcs.php");
$pdo = db_connect();

// 指定された並び替え順を受信
$sort = isset($_POST['sort']) ? $_POST['sort'] : null;

// SQL文を切り替え
if ($sort === "priceAsc") {
    // 価格の低い順
    $stmt = $pdo->prepare("SELECT * FROM carall ORDER BY price ASC;");
} elseif ($sort === "priceDesc") {
    // 価格の高い順
    $stmt = $pdo->prepare("SELECT * FROM carall ORDER BY price DESC;");
}

$stmt->execute();

// $valuesのグローバル化
global $values; 
$values = $stmt->fetchAll(PDO::FETCH_ASSOC); 

?>