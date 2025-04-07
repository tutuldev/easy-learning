<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Web Applications'],
            ['name' => 'Mobile Applications'],
            ['name' => 'Robotics'],
            ['name' => 'Securities'],
            ['name' => 'Other'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
