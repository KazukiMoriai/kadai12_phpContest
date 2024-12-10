<?php
session_start();
require_once("funcs.php");
sessionCheck();

//getデータ受信
$id = $_GET["id"];

//db接続
$pdo = db_connect();

//SQL文
$sql    = "DELETE FROM users WHERE id=:id";
$stmt   = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); 

//sql実行後
if($status==false){
  sql_error($stmt);
}else{
  redirect("userAll.php");
}

?>