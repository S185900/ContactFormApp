<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategoriesTableSeeder::class, // 先にcategoriesデータを挿入
            ContactsTableSeeder::class,   // 後でcontactsデータを挿入
        ]);
    }
}
