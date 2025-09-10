<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('authors')->insert([
            ['id' => 1, 'full_name' => 'Айболат Кулатай', 'email' => 'aibolat@example.com'],
            ['id' => 2, 'full_name' => 'John Doe', 'email' => 'john@example.com'],
        ]);
    }
}
