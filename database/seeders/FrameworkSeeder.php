<?php

namespace Database\Seeders;

use App\Models\Framework;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FrameworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $frameworks = [
            ['name' => 'ASP.NET Core'],
            ['name' => 'Spring Boot'],
            ['name' => 'Express.js'],
            ['name' => 'Django'],
            ['name' => 'Ruby on Rails'],
            ['name' => 'Lavarel'],
            ['name' => 'FastAPI'],
        ];

        foreach ($frameworks as $framework) {
            Framework::create($framework);
        }
    }
}
