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
  <form action="insert.php" method="post" enctype="multipart/form-data">
  <table>
    <tr><th class="midashi"></th><th class="naiyou"></th></tr>
    <tr>
      <td>メーカー</td>
      <td>
        <select name="maker" id="maker" onchange="updateModels()" required="required">
          <option value="">選択してください</option>
          <!-- 国内メーカー -->
          <option value="toyota">トヨタ</option>
          <option value="honda">ホンダ</option>
          <option value="nissan">日産</option>
          <option value="suzuki">スズキ</option>
          <option value="mazda">マツダ</option>
          <option value="subaru">スバル</option>
          <option value="mitsubishi">三菱</option>
          <option value="daihatsu">ダイハツ</option>
          <option value="isuzu">いすゞ</option>
          <!-- 海外メーカー -->
          <option value="ford">フォード</option>
          <option value="chevrolet">シボレー</option>
          <option value="gmc">GMC</option>
          <option value="tesla">テスラ</option>
          <option value="jeep">ジープ</option>
          <option value="bmw">BMW</option>
          <option value="mercedes-benz">メルセデス・ベンツ</option>
          <option value="audi">アウディ</option>
          <option value="volkswagen">フォルクスワーゲン</option>
          <option value="porsche">ポルシェ</option>
          <option value="peugeot">プジョー</option>
          <option value="renault">ルノー</option>
          <option value="citroen">シトロエン</option>
          <option value="volvo">ボルボ</option>
          <option value="saab">サーブ</option>
          <option value="fiat">フィアット</option>
          <option value="ferrari">フェラーリ</option>
          <option value="lamborghini">ランボルギーニ</option>
          <option value="maserati">マセラティ</option>
          <option value="jaguar">ジャガー</option>
          <option value="land-rover">ランドローバー</option>
          <option value="hyundai">ヒュンダイ</option>
          <option value="kia">キア</option>
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
        <input type="number" name="price" required="required"> 円
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
      <td><input type="number" name="distance" required="required"> km</td>
    </tr>
    <tr>
      <td>車検有効期限</td>
      <td><input type="date" name="expiry" required="required"></td>
    </tr>
    <tr>
    <td>修理歴</td>
      <td>
        <input type="radio" id="repairYes" name="repair" value="1">
        <label for="repairYes">あり</label><br>
        <input type="radio" id="repairNo" name="repair" value="0">
        <label for="repairNo">なし</label>
      </td>
    </tr>
    <tr>
      <td>車両の画像</td>
      <td><input type="file" name="headImg" accept="image/*"></td>
    </tr>
    <tr>
    <tr>
      <td colspan="2" style="text-align: center;">
        <input type="submit" value="送信">
      </td>
    </tr>
  </table>
</form>
</div>

<?php include("../include/footer.html"); ?>

<script>
  // モデルのプルダウン作成
  const carModels = {
    toyota: ["カローラ", "プリウス", "クラウン", "ランドクルーザー", "ハリアー", "ヤリス", "アルファード", "ヴェルファイア", "アクア", "カムリ"],
    honda: ["シビック", "アコード", "フィット", "CR-V", "NSX", "ヴェゼル", "オデッセイ", "シャトル", "フリード", "インサイト"],
    // ... 他のメーカーのデータも同様
  };

  function updateModels() {
    const makerSelect = document.getElementById("maker");
    const modelSelect = document.getElementById("model");
    const selectedMaker = makerSelect.value;
    // 既存の車種オプションをクリア
    modelSelect.innerHTML = '<option value="">選択してください</option>';
    // 選択されたメーカーの配列の呼び出し
    if (carModels[selectedMaker]) {
      carModels[selectedMaker].forEach(model => {
        const option = document.createElement("option");
        option.value = model;
        option.textContent = model;
        modelSelect.appendChild(option);
      });
    }
  }

  // 年式のプルダウン作成
  const yearSelect = document.getElementById("year");
  for (let i = 2024; i >= 1900; i--) {
    const option = document.createElement("option");
    option.value = i;
    option.textContent = `${i}年`;
    yearSelect.appendChild(option);
  }

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
