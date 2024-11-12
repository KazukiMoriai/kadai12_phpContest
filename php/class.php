<?php
// 出品された車のクラス設定
class Car {
    // プロパティ一覧
    private $random;
    private $maker;
    private $model;
    private $price;
    private $year;
    //プロパティの初期化
    public function __construct($random, $maker, $model, $price, $year) {
        $this->random = $random;
        $this->maker = $maker;
        $this->model = $model;
        $this->price = $price;
        $this->year = $year;
    }
    // データのキーとする乱数の生成
    public static function generateRandom($n = 8) {
        return substr(base_convert(bin2hex(openssl_random_pseudo_bytes($n)), 16, 36), 0, $n);
    }
    //プロパティの外だし
    public function getRandom() {
        return $this->random;
    }
    public function getMaker() {
        return $this->maker;
    }
    public function getModel() {
        return $this->model;
    }
    public function getPrice() {
        return $this->price;
    }
    public function getYear() {
        return $this->year;
    }
}

// POSTにデータがある場合のみbuy.phpへ遷移
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["maker"], $_POST["model"], $_POST["price"], $_POST["year"])) {
    $maker = $_POST["maker"];
    $model = $_POST["model"];
    $price = $_POST["price"];
    $year = $_POST["year"];
    // インスタンス作成
    $random = Car::generateRandom();
    $car = new Car($random, $maker, $model, $price, $year);
    $c = ",";
    $str = $car->getRandom() . $c . $car->getMaker() . $c . $car->getModel() . $c . $car->getPrice() . $c . $car->getYear();
    
    //data.csvへ追加
    $file = fopen("../csv/data.csv", "a");
    fwrite($file, $str . "\n");
    fclose($file);
    // データを保存した後だけリダイレクト
    header("Location: sell.php");
    exit;
}
