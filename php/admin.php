<!DOCTYPE html>
<html lang="ja">
<!-- 最初の設定は終わっています　必要な方は触ってください -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LoveYourCars 購入</title>
    <style>
    a {
        color: inherit; /* 親要素の色を継承する */
        text-decoration: none; /* 下線を消す */
    }
    </style>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/buy.css">
    <!-- サイト全体のフォント -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- topのLoveYourCarsのフォント -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="module" src="js/main.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>
<!-- 最初の設定は終わっています　必要な方は触ってください -->
<body>
    <!-- ここから下にコードを書く -->
    <?php include("../html/header.html");?>

        <!-- 並び替え -->
        <form action="" method="post">
            <input type="radio" name="sort" id="priceAsc" value="priceAsc">
            <label for="priceAsc">価格が低い順</label>
            <input type="radio" name="sort" id="priceDesc" value="priceDesc">
            <label for="priceDesc">価格が高い順</label>
            <button type="submit">ソート</button>
        </form>

    <?php
        include("select.php");
        include("sort.php");
        global $values; 
        
        // 条件に合う車両のみ表示
        foreach ($values as $v) {?>
    
<!-- 車両表示 -->

<div class="cars-container">
<div class="car">
    <span class="c0">  
        <button><div class="up"><a href="detail.php?id=<?=$v["id"]?>">更新</a></div></button>
        <button><div class="del" data-id="<?=$v['id']?>">削除</div></button>
    </span>
    <span class="c1"><img src="<?=$v["headImg"]?>" alt="車両画像" id="carImg"></span>
    <span class="c2">
        <div class="c21">
            <span class="c211">
                <div class="c2111"><?=$v["maker"]?></div>
                <div class="c2112"><?=$v["model"]?></div>
            </span>
            <span class="c212">支払総額：<?=$v["price"]/10000?>万円</span>
        </div>
        <div class="c22">
            <span class="c221">年式<br><?=$v["year"]?></span>
            <span class="c222">走行距離<br><?=$v["distance"]/10000?>万km</span>
            <span class="c223">車検有効期限<br><?=$v["expiry"]?></span>
            <span class="c224">修理歴<br><?php 
            if($v["repair"]==0){
                echo "なし";
            }else{
                echo "あり";
            }
            ?></span>
        </div>
        <div class="c23">
            <span class="c231"><img src="../img/person/man1.png" alt="整備士の画像"></span>
            <span class="c232">
                <div class="c2321">お得な一台！！</div>
                <div class="c2322">相場より30万円程安い価格で出品されています！足回りも状態が良く、内装も目立った汚れが御座いません。安心してお乗りいただける一台となっております！</div>
            </span>
        </div>
    </span>
</div>
</div>
    <?php }?>
    <!-- モーダルのHTML -->
<div id="confirmModal" title="確認" style="display:none;">
    <div class="modal-content">
        <p>本当に削除しますか？</p>
    </div>
</div>
    <script>
    // モデルのプルダウン作成用のデータ
        const carModels = {
            toyota: ["アクア", "プリウス", "クラウン", "カムリ", "ランドクルーザー"],
            honda: ["フィット", "シビック", "アコード", "CR-V", "オデッセイ"],
            nissan: ["ノート", "リーフ", "セレナ", "エクストレイル", "GT-R"],
            suzuki: ["アルト", "スイフト", "ワゴンR", "ジムニー", "ソリオ"],
            mazda: ["CX-5", "マツダ3", "ロードスター", "MX-30"],
            subaru: ["インプレッサ", "レヴォーグ", "フォレスター", "BRZ"],
            mitsubishi: ["アウトランダー", "ランサー", "デリカ", "エクリプスクロス"],
            daihatsu: ["ムーヴ", "タント", "アトレー", "ミライース"],
            isuzu: ["D-MAX", "MU-X"],
            ford: ["フォード・マスタング", "エクスプローラー", "F-150"],
            chevrolet: ["シボレー・コルベット", "シボレー・カマロ"],
            gmc: ["シエラ", "アカディア"],
            tesla: ["モデルS", "モデル3", "モデルX", "モデルY"],
            jeep: ["ラングラー", "チェロキー", "グランドチェロキー"],
            bmw: ["3シリーズ", "5シリーズ", "7シリーズ", "X5"],
            "mercedes-benz": ["Aクラス", "Cクラス", "Eクラス", "GLC"],
            audi: ["A3", "A4", "A6", "Q5"],
            volkswagen: ["ゴルフ", "ポロ", "パサート", "ティグアン"],
            porsche: ["911", "カイエン", "マカン"],
            peugeot: ["208", "3008", "5008"],
            renault: ["カングー", "メガーヌ", "トゥインゴ"],
            citroen: ["C3", "C4", "C5"],
            volvo: ["XC60", "XC90", "V60"],
            saab: ["9-3", "9-5"],
            fiat: ["500", "パンダ"],
            ferrari: ["488", "F8", "ローマ"],
            lamborghini: ["ウラカン", "アヴェンタドール"],
            maserati: ["ギブリ", "クアトロポルテ"],
            jaguar: ["Fタイプ", "XE", "XJ"],
            "land-rover": ["ディスカバリー", "レンジローバー"],
            hyundai: ["エラントラ", "ソナタ", "ツーソン"],
            kia: ["セルトス", "スポーテイジ", "ソウル"]
        };
        // 車種プルダウンを更新する関数
        function updateModels() {
            // メーカーとモデルのセレクトボックスを取得
            const makerSelect = document.getElementById("maker");
            const modelSelect = document.getElementById("model");
            
            // 選択されたメーカーを取得
            const selectedMaker = makerSelect.value;

            // 既存の車種オプションをクリア
            modelSelect.innerHTML = '<option value="">車種を選択してください</option>';

            // 選択されたメーカーが存在する場合にのみ処理
            if (selectedMaker && carModels[selectedMaker]) {
                // メーカーの全モデルに繰り返し処理
                carModels[selectedMaker].forEach(model => {
                    const option = document.createElement("option");
                    option.value = model;
                    option.textContent = model;
                    modelSelect.appendChild(option);
                });
            }
        }

    $(document).ready(function () {
    // モーダルは最初に開かない
    $("#confirmModal").dialog({
        autoOpen: false,  // 自動では開かない
        modal: true,      // モーダル外クリックをブロック
        buttons: {
            "はい": function () {
                let itemId = $(this).data("id");  // モーダルに設定されたIDを取得
                let deleteUrl = "delete.php?id=" + itemId;  // 削除URLを作成
                window.location.href = deleteUrl;  // 削除処理を実行
            },
            "いいえ": function () {
                $(this).dialog("close");  // モーダルを閉じる
            }
        }
    });

    // 「削除」ボタンがクリックされた時にモーダルを表示
    $(".del").on("click", function() {
        let itemId = $(this).data("id");  // 削除対象のIDを取得
        
        // モーダルにIDを設定してメッセージを追加
        $("#confirmModal").data("id", itemId).find(".modal-content p").text("本当に削除しますか？").end().dialog("open");
    });

    // モーダルの外側（背景部分）をクリックした時にモーダルを閉じる
    $(document).on("click", ".ui-widget-overlay", function () {
        $("#confirmModal").dialog("close"); // 背景をクリックするとモーダルを閉じる
    });
});

    </script>
</body>
</html>
