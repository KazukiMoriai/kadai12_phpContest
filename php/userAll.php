<?php
session_start();
require_once("funcs.php");
sessionCheck();

// db接続
$pdo = db_connect();

//ユーザーデータの抽出
$sql = "SELECT * FROM user_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if($status==false) {
  sql_error($stmt);
}

//全データ取得
$values = "";
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

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
<?php include("../include/header.php");?>
<div>
    <div class="container jumbotron">
      <table>
      <?php foreach($values as $v){ ?>
        <tr>
          <td><?=$v["id"]?></td>
          <td><?=$v["name"]?></td>
          <td><a href="userDetail.php?id=<?=$v["id"]?>">[更新]</a></td>
          <td><div class="del" data-id="<?=$v['id']?>">[削除]</div></td>
        </tr>
      <?php } ?>
      </table>
  </div>
</div>

<!-- モーダルのHTML -->
<div id="confirmModal" title="確認" style="display:none;">
  <div class="modal-content">
    <p>本当に削除しますか？</p>
  </div>
</div>

</body>

<script>
$(document).ready(function () {
// モーダルは最初に開かない
  $("#confirmModal").dialog({
      autoOpen: false,  // 自動では開かない
      modal: true,      // モーダル外クリックをブロック
      buttons: {
          "はい": function () {
              let itemId = $(this).data("id");  // モーダルに設定されたIDを取得
              let deleteUrl = "userDelete.php?id=" + itemId;  // 削除URLを作成
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

</html>