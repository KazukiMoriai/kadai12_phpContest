<?php
session_start();
require_once("funcs.php");
sessionCheck();

//postデータ取得
$name = $_POST["name"];
$id     = $_POST["id"];

//db接続
$pdo = db_connect();

//データ更新sql
$stmt = $pdo->prepare("UPDATE users SET name=:name WHERE id=:id");
$stmt->bindValue(':name',   $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',     $id,     PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("confirmUpdate.php");
}

?>