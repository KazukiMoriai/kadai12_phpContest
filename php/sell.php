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
  <?php  include("../html/header.html");?>    
  <form action="./class.php" method="post">
    <div id="form">
      <div id="inputMaker">
        メーカー：
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
      </div>
      <div id="inputModel">
        モデル　：
        <select name="model" id="model" required="required">
          <option value="">選択してください</option>
        </select>
      </div>
      <div id="inputPrice">
        出品額　：
          <input type="text" name="price" required="required">万円
      </div>
      <div id="inputYear">
        年式　　：
          <select name="year" id="year" required="required">
            <option value="">選択してください</option>
          </select>年式
      </div>
      <input type="submit" value="送信">
    </div>
  </form>

  <?php   include("../html/footer.html");?>

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

    function updateModels() {
      const makerSelect = document.getElementById("maker");
      const modelSelect = document.getElementById("model");
      const selectedMaker = makerSelect.value;
      // 既存の車種オプションをクリア
      modelSelect.innerHTML = '<option value="">車種を選択してください</option>';
      // 選択されたメーカーの配列の呼び出し
      if (carModels[selectedMaker]) {
        // メーカーの全モデルに繰り返し処理
        carModels[selectedMaker].forEach(model => {
          // optionタグの作成
          const option = document.createElement("option");
          option.value = model;
          option.textContent = model;
          modelSelect.appendChild(option);
        });
      }
    }
    // 年式のプルダウン作成
    const yearSelect = document.getElementById("year");
    for(let i = 2024; i >= 1900; i--) {
      const option = document.createElement("option");
      option.value = i;
      option.textContent = `${i}年`;
      yearSelect.appendChild(option);
    }
  </script>
</body>
</html>
