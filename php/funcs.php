<?php
//DB接続
function db_connect(){
    try {
        $db_name = "kadai11_db";    //データベース名
        $db_id   = "root";      //アカウント名
        $db_pw   = "";      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = "localhost"; //DBホスト
        return new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
    } catch (PDOException $e) {
    exit('DB Connection Error:'.$e->getMessage());
    }
}

//SQL実行でエラー時の処理
function sql_error($stmt){
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}

//リダイレクト
function redirect($file_name){
    header("Location: ".$file_name);
    exit();
}


// セッション開始してる？idは正しい？の確認
function sessionCheck(){
    if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
        exit("Login Error");
    }else{
        session_regenerate_id(true);//セッションハイジャック対策。違うidを与えてくれる
        $_SESSION["chk_ssid"] = session_id();
    }
}



?>