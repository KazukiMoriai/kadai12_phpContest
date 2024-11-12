<!DOCTYPE html>
<html lang="ja">
  <!-- 最初の設定は終わっています　必要な方は触ってください -->
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LoveyourCars お問い合わせ</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="module" src="../js/main.js"></script>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/contact.css">
    <!-- サイト全体のフォント -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- topのLoveYourCarsのフォント -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
    <style>
      a {
          color: inherit; /* 親要素の色を継承する */
          text-decoration: none; /* 下線を消す */
      }
    </style>
    
  </head>

  <!-- 最初の設定は終わっています　必要な方は触ってください -->
  <body>
    <!-- ここから下にコードを書く -->

    <?php include("../html/header.html");?>    
    <!-- お問い合わせフォーム -->
          <!-- チャット -->
          <div id="chatspace">
            <div id="output"></div>
            <div id="down">
              <input type="text" id="input" placeholder="メッセージを入力…">
              <button id="send">送信</button>
            </div>
          </div>
    
    <?php    include("../html/footer.html");?>
    
  </body>
</html>
