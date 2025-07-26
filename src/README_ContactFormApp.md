
# アプリケーション名
お問い合わせ管理システム

## 環境構築
1. Dockerを使用した環境構築:
   - `docker-compose up -d` を実行して、コンテナを起動。
   - コンテナ内で、`php artisan migrate` を実行し、データベースを初期化。
   - 必要に応じて `php artisan db:seed` を使用してダミーデータを投入。

2. .envファイルの設定:
   - 必要な環境変数を適切に設定（例：データベース接続情報、APP_KEYの生成など）。

3. アプリケーションの起動:
   - 開発環境用URL: `http://localhost/`

## 使用技術（実行環境）
- Laravel 10.x
- PHP 8.x
- MySQL 8.x
- Docker 20.x

## ER図
以下にER図を挿入してください：
< - ER図の画像 - >

## URL
- 開発環境: `http://localhost/`

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

## 機能概要
1. フロントエンド入力機能
   - 入力フォームは、お名前（姓・名）、性別、お問い合わせ種類、メール、電話番号、住所などを分けて入力。
   - **電話番号は半角数字のみ、ハイフンなし**。

2. 確認機能
   - ユーザー入力を一覧表示し、確認後に送信可能。

3. 検索と管理機能
   - 管理画面でお問い合わせデータを検索・編集可能（名前や性別でフィルタリング）。

4. サンクス画面
   - データ送信後に完了画面を表示し、HOMEボタンでトップページに戻る。

## ダミーデータ作成
1. `contacts` テーブル：
   - ダミーデータ35件を作成（ファクトリを使用）。
2. `categories` テーブル：
   - 以下のデータをシーダーで登録：
     - 商品のお届けについて
     - 商品の交換について
     - 商品トラブル
     - ショップへのお問い合わせ
     - その他

## 提出ルール
1. **ルール**:
   - COACHTECHの教材内言語で開発すること。
   - 教材閲覧・ネット検索可能。ただし、質問対応は禁止。

2. **提出方法**:
   - GitHubで`main`ブランチにコミットし、[こちらのURL](https://lms.coachtech.site/renewal/user/01jk3m1df0x0tj5hx5w651hmrp/applications/check-test/submission/)から提出。

---
