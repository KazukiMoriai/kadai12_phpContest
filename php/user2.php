<!DOCTYPE html>
<html lang="ja">
<!-- 最初の設定は終わっています　必要な方は触ってください -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>LoveYourCars ユーザー登録</title>
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
  <?php // include("../include/header.php");?>   
  <div id="form">
  <form action="userInsert2.php" method="post">
    <table>
      <tr>
        <td>名前</td>
        <td><input type="text" name="name" id="name"></td>
      </tr>
      <tr>
        <td>ログインID</td>
        <td><input type="text" name="lid" id="lid"></td>
      </tr>
      <tr>
        <td>パスワード</td>
        <td><input type="text" name="lpw" id="lpw"></td>
      </tr>
      <tr>
        <td>権限</td>
        <td><input type="radio" name="kanri_flg" id="pub" value=0><label for="pub">一般</label></td>
        <td><input type="radio" name="kanri_flg" id="admin" value=1><label for="admin">管理者</label></td>
      </tr>
    </table>
    <input type="submit" value="登録">
  </form>
  </div>
</body>
</html>
