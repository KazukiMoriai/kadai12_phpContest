<?php
session_start();

//post値を受信
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

// db接続
require_once("funcs.php");
$pdo = db_connect();

//登録SQL
$sql = "SELECT * FROM user_table WHERE lid = :lid AND life_flg=0";
$stmt = $pdo->prepare($sql); //ログインしていい人だけ！
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);//lidだけ渡す！！
$status = $stmt->execute();

//SQL実行時にエラーがある場合STOP
if($status==false){
  sql_error($stmt);
}

//抽出データ数を取得
$val = $stmt->fetch();  //1レコードだけ$valに格納

var_dump($val);


//postのpasswordとdbの暗号化されたpasswordを比較
$pw = password_verify($lpw, $val["lpw"]); //$lpw = password_hash($lpw, PASSWORD_DEFAULT);   //パスワードハッシュ化
if($pw){ 
  //Login成功時
  $_SESSION["chk_ssid"]  = session_id();//SESSIONに預けておく
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];
  //Login成功時（select.phpへ）
  redirect("buy.php");

}else{
  //Login失敗時(login.phpへ)
  redirect("login.php");
}

exit();
?>