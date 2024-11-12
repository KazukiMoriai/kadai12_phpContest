## ①課題名
・JS選手権
 ## ②課題内容（どんな作品か）
・中古車売買サイト　LoveYourCars（出品機能、絞り込み機能）
## ③アプリのデプロイURL デプロイしている場合はURLを記入（任意）
https://moriai.sakura.ne.jp/kadai07_js_contest
https://github.com/KazukiMoriai/kadai07_js_contest.git
## ④アプリのログイン用IDまたはPassword（ある場合）
・ID: なし
・PW:なし
 ## ⑤工夫した点・こだわった点
【技術選定】
・出品車両のデータ保持、出力機能が必要だった為、バックエンド側のPHPをメイン言語として作成

【データの流れ】
①sell.phpで出品車両を登録
②class.phpでclass Carを使い、プロパティをセット
③class Carのインスタンスをdata.csvへ格納
④buy.phpでdata.csvを読み込み配列へ格納。class Carの設定を呼び込み、車両情報へ再度プロパティをセット

【構造】
・全ページで使用するheader.htmlとfooter.htmlを分けて作成し、それぞれのファイルに呼び出す形式とした（編集の容易性）
 （同時にcssも各ページに対応させるようにファイルを分割し、可読性を担保）

【機能面】
・sell.phpにて、出品時の情報を全て入力必須とし、未入力欄がある場合はエラーを返す
・sell.phpにて、メーカーを選択後、該当メーカーの車種のみが車種選択プルダウンへ表示されるよう連携
・data.csvへ車両情報を格納する際、各車両へ乱数を付与（今後実装予定のお気に入り登録や削除機能のため）
・buy.phpの絞り込みにて、メーカー、車種が空欄の場合は全てのメーカー車両が表示されるよう制御
・buy.phpの絞り込みにて、価格、距離が空欄の場合は0かdata.csv内の最大値を返すことで、曖昧検索実装
・buy.phpの絞り込みにて、検索ボタンを押しページがリロードされても、入力した価格、距離が再度セットされるよう制御
・buy.phpにて、車両表示のテンプレート部分のdivタグをPHPのforeach関数で囲むことで、テンプレートの記述のみで全車両表示を可能とした
 ## ⑥次回トライしたいこと（又は機能）
・車両画像の取り扱い
・車両の並び替え機能
 ## ⑦フリー項目（感想、シェアしたいこと等なんでも）