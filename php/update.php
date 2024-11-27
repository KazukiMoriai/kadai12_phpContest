<?php
// エラーの表示
ini_set("display_errors", 1);

// sell.php からデータ取得
$maker     = $_POST["maker"];
$model     = $_POST["model"];
$price     = $_POST["price"];
$year      = $_POST["year"];
$distance  = $_POST["distance"];
$expiry    = $_POST["expiry"];
$repair    = isset($_POST["repairYes"]) ? 1 : 0; // 修理歴（1: あり, 0: なし）
$id        = $_POST["id"];

// 新しい画像がアップロードされた場合の処理
if (isset($_FILES["headImg"]) && $_FILES["headImg"]["error"] == 0) {
    $uploadDir = "../img/car/"; 
    // アップロードされたファイル名を拾う
    $fileName = basename($_FILES["headImg"]["name"]); 
    // 保存先のパスを決める
    $targetFilePath = $uploadDir . $fileName; 

    // ファイルを移動
    if (move_uploaded_file($_FILES["headImg"]["tmp_name"], $targetFilePath)) {
        // 相対パスを格納
        $headImg = "../img/car/" . $fileName; 
    } else {
        exit("画像のアップロードに失敗しました。");
    }
} else {
    // 新しい画像がアップロードされていない場合の処理
    if (!empty($_POST["currentHeadImg"])) {
        $headImg = $_POST["currentHeadImg"]; // 現在の画像パスを使用
    } else {
        $headImg = ""; // 画像が指定されていない場合
    }
}

// DB接続
include("dbConnect.php");

// データ登録 SQL 作成
$sql = "UPDATE carall SET maker=:maker, model=:model, headImg=:headImg, price=:price, year=:year, distance=:distance, expiry=:expiry, repair=:repair WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':maker',    $maker,    PDO::PARAM_STR);
$stmt->bindValue(':model',    $model,    PDO::PARAM_STR);
$stmt->bindValue(':headImg',  $headImg,  PDO::PARAM_STR);
$stmt->bindValue(':price',    $price,    PDO::PARAM_INT);
$stmt->bindValue(':year',     $year,     PDO::PARAM_STR);
$stmt->bindValue(':distance', $distance, PDO::PARAM_INT);
$stmt->bindValue(':expiry',   $expiry,   PDO::PARAM_STR);
$stmt->bindValue(':repair',   $repair,   PDO::PARAM_INT);
$stmt->bindValue(':id',       $id,       PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)

// SQL 実行
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    // SQL 実行時エラー
    $error = $stmt->errorInfo();
    exit("SQLError: " . $error[2]);
} else {
    // index.php へリダイレクト
    header("Location: confirmUpdate.php");
    exit();
}

?>  