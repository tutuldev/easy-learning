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

        Framework::query()->delete();

        $frameworks = [
            'ASP.NET Core',
            'Spring Boot',
            'Express.js',
            'Django',
            'Ruby on Rails',
            'Lavarel',
            'FastAPI',
            'Flutter',
            'React',
            'Vue',
        ];

        foreach ($frameworks as $name) {
            Framework::create([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        }
    }
}
