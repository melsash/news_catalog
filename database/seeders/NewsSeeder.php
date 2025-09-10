<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('news')->insert([
            [
                'id' => 1,
                'title' => 'Первая новость',
                'announce' => 'Анонс первой новости',
                'body' => 'Полный текст первой новости',
                'published_at' => now(),
                'author_id' => 1,
            ],
            [
                'id' => 2,
                'title' => 'Вторая новость',
                'announce' => 'Анонс второй новости',
                'body' => 'Полный текст второй новости',
                'published_at' => now(),
                'author_id' => 2,
            ],
        ]);

        // связываем новости с категориями
        DB::table('category_news')->insert([
            ['news_id' => 1, 'category_id' => 1],
            ['news_id' => 2, 'category_id' => 2],
        ]);
    }
}
