<?php
session_start();
require_once("funcs.php");
sessionCheck();

//id取得
$id = $_GET["id"]; 

// DB接続
$pdo = db_connect();

// データ取得
$stmt = $pdo->prepare("SELECT * FROM carall WHERE id=:id");
$stmt->bindValue(':id',  $_GET["id"],    PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->execute();

// $valuesのグローバル化
$v = ""; 
$v =  $stmt->fetch(); //1行だけとる（一番上の１行）
?>

<!DOCTYPE html>
<html lang="ja">
<!-- 最初の設定は終わっています　必要な方は触ってください -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>LoveYourCars 出品</title>
  <style>
    a {
        color: inherit; /* 親要素の色を継承する */
        text-decoration: none; /* 下線を消す */
    }
  </style>
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/sell.css">
  <!-- サイト全体のフォント -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <!-- topのLoveYourCarsのフォント -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
</head>
  <!-- 最初の設定は終わっています　必要な方は触ってください -->
<body>
  <!-- ここから下にコードを書く -->
  <?php  include("../include/header.php");?>   
  <div id="form">
  <form action="update.php" method="post" enctype="multipart/form-data">
  <table>
    <tr><th class="midashi"></th><th class="naiyou"></th></tr>
    <tr>
      <td>メーカー</td>
      <td>
    <select name="maker" id="maker" onchange="updateModels()" required="required">
    <option value="" <?= $v["maker"] === "" ? 'selected' : '' ?>>選択してください</option>
    <!-- 国内メーカー -->
    <option value="toyota" <?= $v["maker"] === "toyota" ? 'selected' : '' ?>>トヨタ</option>
    <option value="honda" <?= $v["maker"] === "honda" ? 'selected' : '' ?>>ホンダ</option>
    <option value="nissan" <?= $v["maker"] === "nissan" ? 'selected' : '' ?>>日産</option>
    <option value="suzuki" <?= $v["maker"] === "suzuki" ? 'selected' : '' ?>>スズキ</option>
    <option value="mazda" <?= $v["maker"] === "mazda" ? 'selected' : '' ?>>マツダ</option>
    <option value="subaru" <?= $v["maker"] === "subaru" ? 'selected' : '' ?>>スバル</option>
    <option value="mitsubishi" <?= $v["maker"] === "mitsubishi" ? 'selected' : '' ?>>三菱</option>
    <option value="daihatsu" <?= $v["maker"] === "daihatsu" ? 'selected' : '' ?>>ダイハツ</option>
    <option value="isuzu" <?= $v["maker"] === "isuzu" ? 'selected' : '' ?>>いすゞ</option>
    <!-- 海外メーカー -->
    <option value="ford" <?= $v["maker"] === "ford" ? 'selected' : '' ?>>フォード</option>
    <option value="chevrolet" <?= $v["maker"] === "chevrolet" ? 'selected' : '' ?>>シボレー</option>
    <option value="gmc" <?= $v["maker"] === "gmc" ? 'selected' : '' ?>>GMC</option>
    <option value="tesla" <?= $v["maker"] === "tesla" ? 'selected' : '' ?>>テスラ</option>
    <option value="jeep" <?= $v["maker"] === "jeep" ? 'selected' : '' ?>>ジープ</option>
    <option value="bmw" <?= $v["maker"] === "bmw" ? 'selected' : '' ?>>BMW</option>
    <option value="mercedes-benz" <?= $v["maker"] === "mercedes-benz" ? 'selected' : '' ?>>メルセデス・ベンツ</option>
    <option value="audi" <?= $v["maker"] === "audi" ? 'selected' : '' ?>>アウディ</option>
    <option value="volkswagen" <?= $v["maker"] === "volkswagen" ? 'selected' : '' ?>>フォルクスワーゲン</option>
    <option value="porsche" <?= $v["maker"] === "porsche" ? 'selected' : '' ?>>ポルシェ</option>
    <option value="peugeot" <?= $v["maker"] === "peugeot" ? 'selected' : '' ?>>プジョー</option>
    <option value="renault" <?= $v["maker"] === "renault" ? 'selected' : '' ?>>ルノー</option>
    <option value="citroen" <?= $v["maker"] === "citroen" ? 'selected' : '' ?>>シトロエン</option>
    <option value="volvo" <?= $v["maker"] === "volvo" ? 'selected' : '' ?>>ボルボ</option>
    <option value="saab" <?= $v["maker"] === "saab" ? 'selected' : '' ?>>サーブ</option>
    <option value="fiat" <?= $v["maker"] === "fiat" ? 'selected' : '' ?>>フィアット</option>
    <option value="ferrari" <?= $v["maker"] === "ferrari" ? 'selected' : '' ?>>フェラーリ</option>
    <option value="lamborghini" <?= $v["maker"] === "lamborghini" ? 'selected' : '' ?>>ランボルギーニ</option>
    <option value="maserati" <?= $v["maker"] === "maserati" ? 'selected' : '' ?>>マセラティ</option>
    <option value="jaguar" <?= $v["maker"] === "jaguar" ? 'selected' : '' ?>>ジャガー</option>
    <option value="land-rover" <?= $v["maker"] === "land-rover" ? 'selected' : '' ?>>ランドローバー</option>
    <option value="hyundai" <?= $v["maker"] === "hyundai" ? 'selected' : '' ?>>ヒュンダイ</option>
    <option value="kia" <?= $v["maker"] === "kia" ? 'selected' : '' ?>>キア</option>
    </select>
      </td>
    </tr>
    <tr>
      <td>モデル</td>
      <td>
        <select name="model" id="model" required="required">
          <option value="">選択してください</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>出品額</td>
      <td>
        <input type="number" name="price" required="required" value="<?=$v["price"]?>"> 円
      </td>
    </tr>
    <tr>
      <td>年式</td>
      <td>
        <select name="year" id="year" required="required">
          <option value="">選択してください</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>走行距離</td>
      <td><input type="number" name="distance" required="required" value="<?=$v['distance']?>"> km</td>
    </tr>
    <tr>
      <td>車検有効期限</td>
      <td><input type="date" name="expiry" required="required" value="<?=$v['expiry']?>"></td>
    </tr>
    <tr>
    <td>修理歴</td>
      <td>
        <input type="radio" id="repairYes" name="repair" value="1" <?= $v["repair"] == "1" ? "checked" : "" ?>>
        <label for="repairYes">あり</label><br>
        <input type="radio" id="repairNo" name="repair" value="0" <?= $v["repair"] == "0" ? "checked" : "" ?>>
        <label for="repairNo">なし</label>
      </td>
    </tr>
    <tr>
    <td>車両の画像</td>
    <td>
      <!-- 現在の画像のプレビュー -->
        <img id="currentImg" src="<?= htmlspecialchars($v["headImg"]) ?>" alt="車両画像" style="max-width: 200px; max-height: 200px;" >
        <!-- 現在の画像パスを保持 -->
        <input type="hidden" name="currentHeadImg" value="<?= htmlspecialchars($v["headImg"]) ?>">     
      <!-- ファイル選択 -->
      <input type="file" name="headImg" accept="image/*" id="headImgInput">
    </td>
    </tr>
    <tr>
    <tr>
      <td colspan="2" style="text-align: center;">
        <input type="submit" value="更新">
      </td>
    </tr>
    <!-- idの受け渡し -->
    <input type="hidden" name="id" value="<?=$v["id"]?>">
  </table>
</form>
</div>

<?php include("../include/footer.html"); ?>

<script>
  // モデルのプルダウン作成
  const carModels = {
      toyota: ["カローラ", "プリウス", "クラウン", "ランドクルーザー", "ハリアー", "ヤリス", "アルファード", "ヴェルファイア", "アクア", "カムリ"],
      honda: ["シビック", "アコード", "フィット", "CR-V", "NSX", "ヴェゼル", "オデッセイ", "シャトル", "フリード", "インサイト"],
      nissan: ["ノート", "リーフ", "スカイライン", "エクストレイル", "GT-R", "セレナ", "デイズ", "ジューク", "キャシュカイ", "マーチ"],
      suzuki: ["スイフト", "ワゴンR", "ジムニー", "エスクード", "ソリオ", "イグニス", "アルト", "バレーノ", "スプラッシュ", "ラパン"],
      mazda: ["マツダ3", "CX-5", "ロードスター", "デミオ", "アテンザ", "ビアンテ", "CX-3", "CX-9", "MX-30", "CX-8"],
      subaru: ["インプレッサ", "レガシィ", "フォレスター", "XV", "BRZ", "レヴォーグ", "WRX", "アウトバック", "サンバー", "トレジア"],
      mitsubishi: ["アウトランダー", "デリカ", "エクリプスクロス", "ミラージュ", "パジェロ", "ランサー", "RVR", "i-MiEV", "ギャラン", "ミニキャブ"],
      daihatsu: ["タント", "ムーヴ", "ロッキー", "ハイゼット", "キャスト", "ウェイク", "ミラ", "トール", "ブーン", "コペン"],
      isuzu: ["エルフ", "ギガ", "ビッグホーン", "ジェミニ", "フォワード", "トルーパー", "MU-X", "ディーマックス", "ビークロス", "ピアッツァ"],
      ford: ["マスタング", "エクスプローラー", "フォーカス", "エスケープ", "エッジ", "エコスポーツ", "エベレスト", "ブロンコ", "フィエスタ", "モンデオ"],
      chevrolet: ["カマロ", "タホ", "コルベット", "サバーバン", "マリブ", "トレイルブレイザー", "シルバラード", "クルーズ", "インパラ", "スパーク"],
      gmc: ["シエラ", "アカディア", "ユーコン", "キャニオン", "サバーバン", "エンボイ", "テレイン", "サファリ", "ジミー", "サバナ"],
      tesla: ["モデルS", "モデル3", "モデルX", "モデルY", "ロードスター", "サイバートラック", "セミ", "モデルXプラッド", "モデルSプラッド", "パワーパック"],
      jeep: ["ラングラー", "チェロキー", "グランドチェロキー", "コンパス", "レネゲード", "グラディエーター", "コマンダー", "パトリオット", "リバティ", "ラティチュード"],
      bmw: ["3シリーズ", "5シリーズ", "X3", "X5", "X1", "4シリーズ", "7シリーズ", "Z4", "X6", "M3"],
      "mercedes-benz": ["Aクラス", "Cクラス", "Eクラス", "Sクラス", "GLA", "GLC", "GLE", "CLS", "GLS", "SL"],
      audi: ["A3", "A4", "Q5", "Q7", "A6", "A8", "Q3", "Q8", "S5", "RS7"],
      volkswagen: ["ゴルフ", "パサート", "ティグアン", "ポロ", "アルテオン", "シャラン", "トゥアレグ", "パサートヴァリアント", "ID.4", "T-ROC"],
      porsche: ["911", "ケイマン", "マカン", "カイエン", "パナメーラ", "ボクスター", "918スパイダー", "タイカン", "356", "カレラGT"],
      peugeot: ["208", "308", "3008", "5008", "2008", "RCZ", "508", "4008", "607", "406"],
      renault: ["クリオ", "メガーヌ", "カングー", "コレオス", "タリスマン", "ゾエ", "カジャール", "エスパス", "サフラン", "デュース"],
      citroen: ["C3", "C4", "C5エアクロス", "DS3", "C1", "C6", "ベルランゴ", "ジャンピー", "サクソ", "ZX"],
      volvo: ["XC40", "XC60", "S60", "V60", "XC90", "V40", "S90", "C30", "V50", "740"],
      saab: ["900", "9-3", "9-5", "9-4X", "9000", "99", "96", "9-7X", "9-X", "92"],
      fiat: ["500", "パンダ", "プント", "ティーポ", "ムルティプラ", "ウーノ", "フィアット850", "500X", "ドブロ", "ブラーボ"],
      ferrari: ["488", "F8", "ローマ", "ポルトフィーノ", "812", "GTC4ルッソ", "カリフォルニアT", "F12ベルリネッタ", "SF90", "ラフェラーリ"],
      lamborghini: ["ウラカン", "アヴェンタドール", "ウルス", "ガヤルド", "ムルシエラゴ", "ディアブロ", "レヴェントン", "センテナリオ", "エスパーダ", "ミウラ"],
      maserati: ["ギブリ", "レヴァンテ", "グラントゥーリズモ", "クアトロポルテ", "MC20", "アルフィエリ", "シャマル", "ビトゥルボ", "メラク", "カリフ"],
      jaguar: ["XE", "XF", "F-PACE", "E-PACE", "XJ", "F-TYPE", "XK", "S-TYPE", "I-PACE", "X-Type"],
      "land-rover": ["レンジローバー", "ディフェンダー", "ディスカバリー", "フリーランダー", "イヴォーク", "レンジローバースポーツ", "ディスカバリースポーツ", "ヴェラール", "ディフェンダー110", "レンジローバーヴォーグ"],
      hyundai: ["エラントラ", "サンタフェ", "ツーソン", "ソナタ", "ベニュー", "クレタ", "パリセード", "アイオニック", "スタレックス", "アバンテ"],
      kia: ["ソウル", "スポーテージ", "フォルテ", "セルトス", "ソレント", "カーニバル", "スティンガー", "セルドナ", "オプティマ", "リオ"]
      };

    document.addEventListener("DOMContentLoaded", () => {
       updateModels(); // ページロード時に事前にモデルを設定
    });

    const makerSelect = document.getElementById("maker");
    makerSelect.addEventListener("change", updateModels); // メーカー変更時にモデルを更新

    function updateModels() {
      const makerSelect = document.getElementById("maker");
      const modelSelect = document.getElementById("model");
      const selectedMaker = makerSelect.value;
      const preselectedModel = "<?=$v["model"]?>"; 

      // モデル選択肢をリセット
      modelSelect.innerHTML = '<option value="">選択してください</option>';

      if (carModels[selectedMaker]) {
        carModels[selectedMaker].forEach(model => {
          const option = document.createElement("option");
          option.value = model;
          option.textContent = model;

          // 事前選択モデルが一致する場合に selected 属性を付加
          if (model === preselectedModel) {
            option.selected = true;
          }
          modelSelect.appendChild(option);
        });
      }
    }

    // 年式のプルダウン作成
    const yearSelect = document.getElementById("year");
    // PHPから渡された事前選択の年式
    const preselectedYear = "<?=$v['year']?>"; 

    for (let i = 2024; i >= 1900; i--) {
      const option = document.createElement("option");
      option.value = i;
      option.textContent = `${i}年`;

      // 年式が事前選択の値と一致していれば selected にする
      if (i == preselectedYear) {
        option.selected = true;
      }

      yearSelect.appendChild(option);
}

  // 画像が選択された際にプレビューと隠しフィールドを更新する
  document.getElementById("headImgInput").addEventListener("change", function(event) {
    const fileInput = event.target;
    const currentImg = document.getElementById("currentImg");
    const hiddenInput = document.querySelector('input[name="currentHeadImg"]');

    // 新しい画像が選択された場合
    if (fileInput.files && fileInput.files[0]) {
      const reader = new FileReader();
      
      // ファイルが読み込まれた後の処理
      reader.onload = function(e) {
        // 画像のプレビューを更新
        currentImg.src = e.target.result;
        currentImg.style.display = "block";  // 新しい画像の表示

        // 隠しフィールドの値を空に設定（新しい画像に変わるため）
        hiddenInput.value = "";
      };

      reader.readAsDataURL(fileInput.files[0]);
    } else {
      // 画像が選択されていない場合は元の画像を表示
      currentImg.style.display = "block";  // 元の画像を表示
      hiddenInput.value = "";  // 隠しフィールドをクリア
    }
  });


  // //車検有効期限を現在～3年後までに制限
  // const today = new Date();
  // const minDate = today.toISOString().split("T")[0];
  // today.setFullYear(today.getFullYear() + 3);
  // const maxDate = today.toISOString().split("T")[0]; 
  // const expiry = document.getElementById("expiry");
  // expiry.min = minDate;
  // expiry.max = maxDate;




</script>
</body>
</html>
