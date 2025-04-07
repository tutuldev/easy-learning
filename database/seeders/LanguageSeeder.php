<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            ['name' => 'PHP'],
            ['name' => 'Python'],
            ['name' => 'Java Script'],
            ['name' => 'Dart'],
        ];

        foreach ($languages as $language) {
            Language::create($language);
        }
    }
}
