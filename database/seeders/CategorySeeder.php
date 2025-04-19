<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // পূর্বের সব ক্যাটেগরি ডিলিট করে দেবে (fresh start)
        Category::truncate();

        $categories = [
            'Web Applications',
            'Mobile Applications',
            'Robotics',
            'Securities',
            'Other',
        ];

        foreach ($categories as $name) {
            Category::create([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        }
    }
}
