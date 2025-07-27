# アプリケーション名： お問い合わせフォーム
FashionablyLate販売サービスのお問い合わせフォーム。
ユーザー認証機能を搭載したアプリです。
社内管理用に管理画面も搭載、「ContactFormApp」という仮の名称をつけております。

1. フロントエンド入力機能
   - 入力フォームは、お名前（姓・名）、性別、お問い合わせ種類、メール、電話番号、住所などを分けて入力。

2. - Fortifyによるユーザー認証機能を搭載（ログイン・登録画面あり）。
   - データ送信後に完了画面を表示し、HOMEボタンでトップページに戻る。

2. 検索と管理機能
   - 管理画面でお問い合わせデータを検索可能。


## 環境構築
1. Dockerを使用した環境構築:
   - SSH のリンクを git cloneしてファイルを複製。
   - docker-compose up -d --builr を実行して、コンテナを作成・起動。
   - コンテナ内で、`php artisan migrate` を実行し、データベースを作成。
   - 必要に応じて `php artisan db:seed` `php artisan make:factory` を使用してダミーデータを投入。

2. .envファイルの設定:
   - 必要な環境変数を適切に設定

3. アプリケーションの起動:
   - 開発環境用URL: `http://localhost/`

## URL
- データベース用URL: `http://localhost:8080/`

## 使用技術（実行環境）
- Laravel 10.x
- PHP 8.x
- MySQL 8.x
- Docker 20.x

| コマンドの一部紹介                           | 説明                                     |
|------------------------------------|------------------------------------------|
| docker-compose up -d --build       | Dockerコンテナ作成・起動
| docker-compose up -d               | Dockerコンテナ起動(アプリ立ち上げ後実行)
| docker ps                          | 実行中のコンテナを一覧表示する  |
| php artisan migrate                | データベースを作成                |
| php artisan make:controller ControllerName | コントローラーを作成               |
| php artisan migrate                | データベースのマイグレーションを実行 |
| php -v                               | PHPのバージョンを確認             |
| php artisan key:generate | APP_KEYの生成  |
| php artisan optimize:clear     | キャッシュクリア |
| composer dump-autoload  | 名前空間とファイルパスの紐付けの自動更新 |


# ER図
<img width="758" height="612" alt="image" src="https://github.com/user-attachments/assets/b22cad8e-f7a0-408e-8350-60b95cd0d4c8" />

./src/resources/ContactFormApp.drawio.png
　※カラム名は単数形にしております

# Tree図
```
views
├── layout
│   └── app.blade.php  [共通レイアウト]
├── contact
│   ├── home.blade.php  [お問い合わせフォーム入力ページ]
│   ├── confirm.blade.php  [確認画面]
│   ├── thanks.blade.php  [サンクスページ]
├── admin
│   ├── admin.blade.php  [管理画面]
    └── app.blade.php  [モーダルウィンドウ]
├── auth
│   ├── register.blade.php  [ユーザ登録ページ]
│   ├── login.blade.php  [ログインページ]
```

## ページ一覧
| ページ名                   | URL          |
|----------------------------|--------------|
| お問い合わせフォーム入力ページ | `/`          |
| お問い合わせフォーム確認ページ | `/confirm`   |
| サンクスページ             | `/thanks`    |
| 管理画面                  | `/admin`     |
| ユーザ登録ページ           | `/register`  |
| ログインページ             | `/login`     |

## テーブル仕様書

### contactsテーブル
| カラム名      | 型              | PRIMARY KEY | NOT NULL | FOREIGN KEY | 補足                              |
|---------------|-----------------|-------------|----------|-------------|-----------------------------------|
| id            | bigint unsigned | ◯           | ◯        |             |                                   |
| category_id   | bigint unsigned |             | ◯        | categories(id) |                                 |
| first_name    | varchar(255)    |             | ◯        |             |                                   |
| last_name     | varchar(255)    |             | ◯        |             |                                   |
| gender        | tinyint         |             | ◯        |             | 1:男性, 2:女性, 3:その他           |
| email         | varchar(255)    |             | ◯        |             |                                   |
| tel           | varchar(255)    |             | ◯        |             | ハイフンなしの形式 (例: 1234567890) |
| address       | varchar(255)    |             | ◯        |             |                                   |
| building      | varchar(255)    |             |          |             |                                   |
| detail        | text            |             | ◯        |             |                                   |
| created_at    | timestamp       |             |          |             |                                   |
| updated_at    | timestamp       |             |          |             |                                   |

### categoriesテーブル
| カラム名     | 型              | PRIMARY KEY | NOT NULL |
|--------------|-----------------|-------------|----------|
| id           | bigint unsigned | ◯           | ◯        |
| content      | varchar(255)    |             | ◯        |
| created_at   | timestamp       |             |          |
| updated_at   | timestamp       |             |          |

### usersテーブル
| カラム名  | 型              | PRIMARY KEY | NOT NULL |
|-----------|-----------------|-------------|----------|
| id        | bigint unsigned | ◯           | ◯        |
| name      | varchar(255)    |             | ◯        |
| email     | varchar(255)    |             | ◯        |
| password  | varchar(255)    |             | ◯        |
| created_at| timestamp       |             |          |
| updated_at| timestamp       |             |          |


## ダミーデータ格納済み
1. `contacts` テーブル：
   - ダミーデータ35件を作成（ファクトリを使用）
2. `categories` テーブル：
   - 以下のデータ5件を登録（シーダーで登録）
     - 商品のお届けについて
     - 商品の交換について
     - 商品トラブル
     - ショップへのお問い合わせ
     - その他
3. `users` テーブル：
   - テスト用ダミーユーザーを1名登録（tinkerで登録）
   - \App\Models\User::create([
    'name' => 'Test User',
    'email' => 'test@example.com',
    'password' => bcrypt('password123'),


## トラブルシューティング

>.envが読み込まれない

   キャッシュが残っている場合が原因

>php artisan config:clear を実行する

   CSRFトークンが不足

>フォームにCSRFトークンがない場合が原因

   @csrf を追加する

>クラスが見つからない

   名前空間の指定が間違っている

>コード内の namespace を確認する

   404 Not Found

>ルートの定義が間違っている可能性

   routes/web.php を再確認する

>SQLSTATE Connection refused

   データベース接続設定のミス

>.env ファイルで DB_HOST などを確認する

   ermission denied

>ストレージリンクが足りていない

   php artisan storage:link を実行する
