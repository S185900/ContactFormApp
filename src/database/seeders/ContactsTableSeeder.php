<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB; // DBファサードを使用するために必要
use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    // ------------ メモ ------------
    // 以下、35件のダミーデータを挿入するためのシーダー(ファクトリ)
    // 冗長なコードを避けるため、DBファサードを使用

    public function run()
    {
        $faker = \Faker\Factory::create('ja_JP'); // 日本語対応のFakerを使用して日本語名と住所に対応
        for ($i = 1; $i <= 35; $i++)
        {
            DB::table('contacts')->insert([
                'category_id' => $faker->numberBetween(1, 5), // 数値は1〜5のランダムなカテゴリーIDのこと
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'gender' => $faker->numberBetween(1, 3), // 数値は　1:男性, 2:女性, 3:その他のこと
                'email' => $faker->unique()->safeEmail, // 適当なメールアドレス
                'tel' => $faker->phoneNumber, // 適当な電話番号
                'address' => $faker->address, // 適当な住所
                'building' => $faker->optional()->secondaryAddress, // 適当な建物名(任意)
                'detail' => $faker->sentence, // 適当でランダムな文章
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
