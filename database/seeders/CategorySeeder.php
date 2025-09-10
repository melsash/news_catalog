<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Спорт', 'parent_id' => null],
            ['id' => 2, 'name' => 'Технологии', 'parent_id' => null],
        ]);
    }
}
