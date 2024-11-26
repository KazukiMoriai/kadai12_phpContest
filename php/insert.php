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

// ファイル処理
if (isset($_FILES["headImg"]) && $_FILES["headImg"]["error"] == 0) {
    $uploadDir = "../img/car/"; // 保存先ディレクトリ
    $fileName = basename($_FILES["headImg"]["name"]); // アップロードされたファイル名
    $targetFilePath = $uploadDir . $fileName; // 保存先パス

    // ファイルを移動
    if (move_uploaded_file($_FILES["headImg"]["tmp_name"], $targetFilePath)) {
        $headImg = "../img/car/" . $fileName; // 相対パスを保存
    } else {
        exit("画像のアップロードに失敗しました。");
    }
} else {
    $headImg = ""; // ファイルがアップロードされていない場合
}

// DB接続
include("dbConnect.php");

// データ登録 SQL 作成
$sql = "INSERT INTO carall (maker, model, date, headImg, price, year, distance, expiry, repair) 
        VALUES (:maker, :model, sysdate(), :headImg, :price, :year, :distance, :expiry, :repair);";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':maker',    $maker,    PDO::PARAM_STR);
$stmt->bindValue(':model',    $model,    PDO::PARAM_STR);
$stmt->bindValue(':headImg',  $headImg,  PDO::PARAM_STR);
$stmt->bindValue(':price',    $price,    PDO::PARAM_INT);
$stmt->bindValue(':year',     $year,     PDO::PARAM_STR);
$stmt->bindValue(':distance', $distance, PDO::PARAM_INT);
$stmt->bindValue(':expiry',   $expiry,   PDO::PARAM_STR);
$stmt->bindValue(':repair',   $repair,   PDO::PARAM_INT);

// SQL 実行
$status = $stmt->execute();

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