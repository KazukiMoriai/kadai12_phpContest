## ①課題名
・db連携③ （認証機能）
 ## ②課題内容（どんな作品か）
・中古車売買サイト 「LoveYourCars」（ユーザー認証）
## ③アプリのデプロイURL デプロイしている場合はURLを記入（任意）
・ https://moriai.sakura.ne.jp/kadai11_db3/php/login.php
## ④アプリのログイン用IDまたはPassword（ある場合）
【管理者】  
・ID:test1   
・PW:test1  
【一般】  
・ID:test2   
・PW:test2  
 ## ⑤工夫した点・こだわった点
・ユーザー新規登録において、以下2種類のアプローチを整備した  
　①管理者用の遷移（userAll.php→user.php→userInsert.php）  
　②初めてサイトを訪れる人用の遷移（login.php→user2.php→userInsert2.php）  
　※login.phpからuser.phpへ遷移させると、ログインしていないのにsession_idを持ってしまうため    
・車両情報の更新削除は、管理者のみが可能とした  
・userDetail.phpにて「名前」のみ変更可能とした  
　└管理者が他人のidやpwを変更できてしまうと、ユーザーがログインできない事象が発生する為  
・phpファイル数が増えファイル相関が複雑となったため、Lucidで図示してから作業した
![file_flow](https://github.com/user-attachments/assets/ff51019f-94f0-4fff-9fb9-cd24321e56c1)
URL：https://lucid.app/lucidchart/13b140c5-8f89-45e7-8710-4ad904b76ae5/edit?invitationId=inv_9192f93d-4e4a-456c-bb80-f3b8bd6df6d5 

 ## ⑥難しかった点・次回トライしたいこと（又は機能）
・講義でFigmaに触れたのでUI/UXも工夫したかったが、cssまで手が回らなかった。
 ## ⑦フリー項目（感想、シェアしたいこと等なんでも
・機能が徐々に増えてきたが、その分改修するのが大変になってきた。共通部品をfunc.phpへまとめる等、どんどん工夫が必要だなと感じた。
