<?php
session_start();
require_once("funcs.php");
sessionCheck();

// データ取得
$id = $_GET["id"];

//db接続
$pdo = db_connect();

//データ登録SQL作成
$stmt = $pdo->prepare("DELETE FROM cars WHERE id =:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//sql実行後
if($status==false){
    sql_error($stmt);
}else{
    redirect("admin.php");
}
?>