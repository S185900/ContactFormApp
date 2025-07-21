<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB; // DBファサードを使用するために必要
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    // ------------ メモ ------------
    // 以下、指定された名称の5件のダミーデータを挿入するためのシーダー
    // タイムスタンプカラムがNULLになるエラー回避・履歴管理のためタイムスタンプ使用
    // 冗長なコードを避けるため、DBファサードを使用

    public function run()
    {
        DB::table('categories')->insert([
            ['content' => '商品のお届けについて', 'created_at' => now(), 'updated_at' => now()],
            ['content' => '商品の交換について', 'created_at' => now(), 'updated_at' => now()],
            ['content' => '商品トラブル', 'created_at' => now(), 'updated_at' => now()],
            ['content' => 'ショップへのお問い合わせ', 'created_at' => now(), 'updated_at' => now()],
            ['content' => 'その他', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
