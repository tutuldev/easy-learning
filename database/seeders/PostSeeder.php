<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Web Applications',
            'Mobile Applications',
            'Robotics',
            'Securities',
            'Other',
        ];

        $frameworks = [
            'ASP.NET Core',
            'Spring Boot',
            'Express.js',
            'Django',
            'Ruby on Rails',
            'Lavarel',
            'FastAPI',
        ];

        $languages = [
            'PHP',
            'Python',
            'Java Script',
            'Dart',
            'Database',
        ];

        $structers = [
            'Procedural Structure',
            'Object-Oriented Structure (OOP)',
            'Functional Structure',
            'Hierarchical Database Structure',
            'Relational Database Structure',
            'Document-Based Database (NoSQL)',
            'Key-Value Database',
            'Graph Database',
        ];

        // Loop through to create 10 posts
        for ($i = 1; $i <= 10; $i++) {
            $title = 'Post Title ' . $i;
            Post::create([
                'title' => $title,
                'slug' => Str::slug($title) . '-' . $i,
                'description' => 'This is the description for post ' . $i,
                'category' => $categories[array_rand($categories)],
                'framework' => $frameworks[array_rand($frameworks)],
                'language' => $languages[array_rand($languages)],
                'structer' => $structers[array_rand($structers)],
                'code' => '<p>This is some example code content for post ' . $i . '.</p>',
                'image' => null,
            ]);
        }
    }
}
