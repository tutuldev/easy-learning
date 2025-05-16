<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Html Learn',
                'slug' => Str::slug('Html Learn'),
                'description' => 'Learn how to build a secure web application using Django.',
                'category_id' => 4,
                'framework_id' => null,
                'topic_id' => 1,
                'structer_id' => 1,
                'codes' => ['<p>Example of user authentication implementation.</p>'],
                'code_titles' => ['Authentication Code'],
                'images' => [],

            ],
            [
                'title' => 'Html Structure',
                'slug' => Str::slug('Html Structure'),
                'description' => 'Learn the structure of a basic HTML document.',
                'category_id' => 4,
                'framework_id' => null,
                'topic_id' => 1,
                'structer_id' => 1,
                'codes' => ['<p>Example of user authentication implementation.</p>'],
                'code_titles' => ['Authentication Code'],
                'images' => [],

            ],
            [
                'title' => 'HTML Tags Overview',
                'slug' => Str::slug('HTML Tags Overview'),
                'description' => 'A quick overview of common HTML tags.',
                'category_id' => 4,
                'framework_id' => null,
                'topic_id' => 1,
                'structer_id' => 1,
                'codes' => ['<p>Example of user authentication implementation.</p>'],
                'code_titles' => ['Authentication Code'],
                'images' => [],

            ],
            [
                'title' => 'CSS Basics',
                'slug' => Str::slug('CSS Basics'),
                'description' => 'Learn the basics of styling web pages using CSS.',
                'category_id' => 4,
                'framework_id' => null,
                'topic_id' => 2,
                'structer_id' => 1,
                'codes' => ['<p>Example of user authentication implementation.</p>'],
                'code_titles' => ['Authentication Code'],
                'images' => [],

            ],
            [
                'title' => 'CSS Structure',
                'slug' => Str::slug('CSS Structure'),
                'description' => 'Understand how CSS is structured.',
                'category_id' => 4,
                'framework_id' => null,
                'topic_id' => 2,
                'structer_id' => 1,
                'codes' => ['<p>Example of user authentication implementation.</p>'],
                'code_titles' => ['Authentication Code'],
                'images' => [],

            ],
            [
                'title' => 'CSS All Properties',
                'slug' => Str::slug('CSS All Properties'),
                'description' => 'List of important CSS properties for beginners.',
                'category_id' => 4,
                'framework_id' => null,
                'topic_id' => 2,
                'structer_id' => 1,
                'codes' => ['<p>Example of user authentication implementation.</p>'],
                'code_titles' => ['Authentication Code'],
                'images' => [],

            ],
            [
                'title' => 'JavaScript Overview',
                'slug' => Str::slug('JavaScript Overview'),
                'description' => 'Introduction to JavaScript basics.',
                'category_id' => 4,
                'framework_id' => null,
                'topic_id' => 3,
                'structer_id' => 1,
                'codes' => ['<p>Example of user authentication implementation.</p>'],
                'code_titles' => ['Authentication Code'],
                'images' => [],

            ],
            [
                'title' => 'JavaScript Structure',
                'slug' => Str::slug('JavaScript Structure'),
                'description' => 'Understand basic structure of JavaScript programs.',
                'category_id' => 4,
                'framework_id' => null,
                'topic_id' => 3,
                'structer_id' => 1,
                'codes' => ['<p>Example of user authentication implementation.</p>'],
                'code_titles' => ['Authentication Code'],
                'images' => [],

            ],
            [
                'title' => 'JavaScript How to Use',
                'slug' => Str::slug('JavaScript How to Use'),
                'description' => 'How to embed and use JavaScript in a webpage.',
                'category_id' => 4,
                'framework_id' => null,
                'topic_id' => 3,
                'structer_id' => 1,
                'codes' => ['<p>Example of user authentication implementation.</p>'],
                'code_titles' => ['Authentication Code'],
                'images' => [],

            ],
            [
                'title' => 'PHP Introduction',
                'slug' => Str::slug('PHP Introduction'),
                'description' => 'Getting started with PHP programming.',
                'category_id' => 4,
                'framework_id' => null,
                'topic_id' => 4,
                'structer_id' => 1,
                'codes' => ['<p>Example of user authentication implementation.</p>'],
                'code_titles' => ['Authentication Code'],
                'images' => [],

            ],
            [
                'title' => 'Simple PHP Structure',
                'slug' => Str::slug('Simple PHP Structure'),
                'description' => 'Understand the structure of a basic PHP program.',
                'category_id' => 1,
                'framework_id' => null,
                'topic_id' => 4,
                'structer_id' => 1,
                'codes' => ['<p>Example of user authentication implementation.</p>'],
                'code_titles' => ['Authentication Code'],
                'images' => [],

            ],
            [
                'title' => 'Learn PHP with OOP',
                'slug' => Str::slug('Learn PHP with OOP'),
                'description' => 'Introduction to Object-Oriented Programming in PHP.',
                'category_id' => 4,
                'framework_id' => null,
                'topic_id' => 4,
                'structer_id' => 2,
                'codes' => ['<p>Example of user authentication implementation.</p>'],
                'code_titles' => ['Authentication Code'],
                'images' => [],

            ],
            [
                'title' => 'PHP Functions',
                'slug' => Str::slug('PHP Functions'),
                'description' => 'Understanding PHP functions and their uses.',
                'category_id' => 4,
                'framework_id' => null,
                'topic_id' => 4,
                'structer_id' => 1,
                'codes' => ['<p>Example of user authentication implementation.</p>'],
                'code_titles' => ['Authentication Code'],
                'images' => [],

            ],
            [
                'title' => 'Django intro',
                'slug' => Str::slug('Django intro'),
                'description' => 'Understanding PHP functions and their uses.',
                'category_id' => 1,
                'framework_id' => 4,
                'topic_id' => 5,
                'structer_id' => 9,
                'codes' => ['<p>Example of user authentication implementation.</p>'],
                'code_titles' => ['Authentication Code'],
                'images' => [],

            ],
            [
                'title' => 'Django how to use',
                'slug' => Str::slug('Django how to use'),
                'description' => 'Understanding PHP functions and their uses.',
                'category_id' => 1,
                'framework_id' => 4,
                'topic_id' => 5,
                'structer_id' => 9,
                'codes' => ['<p>Example of user authentication implementation.</p>'],
                'code_titles' => ['Authentication Code'],
                'images' => [],

            ],
            [
                'title' => 'Django property',
                'slug' => Str::slug('Django property'),
                'description' => 'Understanding PHP functions and their uses.',
                'category_id' => 1,
                'framework_id' => 4,
                'topic_id' => 5,
                'structer_id' => 9,
                'codes' => ['<p>Example of user authentication implementation.</p>'],
                'code_titles' => ['Authentication Code'],
                'images' => [],

            ],
            [
                'title' => 'Laravel Intro',
                'slug' => Str::slug('Laravel Intro'),
                'description' => 'Understanding PHP functions and their uses.',
                'category_id' => 1,
                'framework_id' => 6,
                'topic_id' => 4,
                'structer_id' => 9,
                'codes' => ['<p>Example of user authentication implementation.</p>'],
                'code_titles' => ['Authentication Code'],
                'images' => [],

            ],
            [
                'title' => 'Laravel how to use',
                'slug' => Str::slug('Laravel how to use'),
                'description' => 'Understanding PHP functions and their uses.',
                'category_id' => 1,
                'framework_id' => 6,
                'topic_id' => 4,
                'structer_id' => 9,
                'codes' => ['<p>Example of user authentication implementation.</p>'],
                'code_titles' => ['Authentication Code'],
                'images' => [],

            ],
            [
                'title' => 'Laravel structer',
                'slug' => Str::slug('Laravel structer'),
                'description' => 'Understanding PHP functions and their uses.',
                'category_id' => 1,
                'framework_id' => 6,
                'topic_id' => 4,
                'structer_id' => 9,
                'codes' => ['<p>Example of user authentication implementation.</p>'],
                'code_titles' => ['Authentication Code'],
                'images' => [],
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
