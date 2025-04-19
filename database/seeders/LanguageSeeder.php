<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // পুরাতন সব ডেটা মুছে নতুন করে ইনসার্ট
        Language::truncate();

        $languages = [
            'PHP',
            'Python',
            'Java Script',
            'Dart',
        ];

        foreach ($languages as $name) {
            Language::create([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        }
    }
}
