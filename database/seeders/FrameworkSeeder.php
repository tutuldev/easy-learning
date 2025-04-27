<?php

namespace Database\Seeders;

use App\Models\Framework;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FrameworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // আগের সব ফ্রেমওয়ার্ক মুছে ফেলবে (fresh insert)
        Framework::truncate();

        $frameworks = [
            'ASP.NET Core',
            'Spring Boot',
            'Express.js',
            'Django',
            'Ruby on Rails',
            'Lavarel',
            'FastAPI',
            'Without Framework',
        ];

        foreach ($frameworks as $name) {
            Framework::create([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        }
    }
}
