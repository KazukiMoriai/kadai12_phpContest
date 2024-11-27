<?php
// データ取得
$id = $_GET["id"];

// DB接続
include("dbConnect.php");

//データ登録SQL作成
$stmt = $pdo->prepare("DELETE FROM carall WHERE id =:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

// データ登録処理後
if ($status == false) {
    // SQL 実行時エラー
    $error = $stmt->errorInfo();
    exit("SQLError: " . $error[2]);
} else {
    // index.php へリダイレクト
    header("Location: buy.php");
    exit();
}









?>