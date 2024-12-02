-- insert
INSERT INTO carall(maker,model,date,headImg,price,year,distance,expiry,repair)VALUES(:maker,::model,sysdate(),:headImg,:price,:year,:distance,:expiry,:repair);

-- sort
-- 価格の安い順
SELECT * FROM carall ORDER BY price ASC;


-- loginAct.php ユーザーの照合
SELECT * FROM user_table WHERE lid = lid, AND life_flg=0;

-- ユーザーの削除
DELETE FROM user_table WHERE id=:id;