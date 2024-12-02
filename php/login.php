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


<body>
<div id="title">Welcome to LoveYourCars.</div>

<div id="form">
  <form action="loginAct.php" method="post">
  <div id="name">
    <div id="loginId">ユーザーID</div>
    <input type="text" name="lid" placeholder="例) sato">
  </div>
  <div id="name">
    <div id="loginPw">パスワード</div>
    <input type="password" name="lpw"">
  <input type="submit" value="ログイン">
  </form>
</div>

<div id="new">
    <input type="button" value="新規登録はこちら" onclick="location.href='./user2.php'">
</div>





</body>

</html>