# 環境構築手順
1. リポジトリをクローン
``` git clone https://github.com/daiki-miura-epkotsoftware/blog_to_rokumaru_mvc.git ```

2. リポジトリに移動
``` cd blog_to_rokumaru_mvc ```

3. env_example.phpをリポジトリ直下へコピーしてenv.phpへリネーム
``` cp env_example.php env.php```

4. DBホスト名、DB名、DBユーザー名、DBパスワードをenv.phpを編集して設定

# DBの復元手順
1. リポジトリへ移動
``` cd blog_to_rokumaru_mvc ```

2. dump.sqlファイルがあることを確認
``` ls ```

3. MySQLサーバーにログイン
``` mysql -u root -p ```

4. DBを作成
``` CREATE DATABASE blog_app ```

5. MySQLサーバーからログアウト
``` exit ```

6. DB環境を復元（リストア）
``` mysql -u blog_user -pmiura0321 blog_app < dump.sql ```