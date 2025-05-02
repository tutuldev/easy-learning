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
                'framework_id' => 2,
                'topic_id' => 1,
                'structer_id' => 1,
                'code' => '<p>Example of user authentication implementation.</p>',
                'image' => null,
            ],
            [
                'title' => 'Html Structure',
                'slug' => Str::slug('Html Structure'),
                'description' => 'Learn the structure of a basic HTML document.',
                'category_id' => 4,
                'framework_id' => 2,
                'topic_id' => 1,
                'structer_id' => 1,
                'code' => '<p>&lt;!DOCTYPE html&gt;&lt;html&gt;&lt;head&gt;&lt;/head&gt;&lt;body&gt;&lt;/body&gt;&lt;/html&gt;</p>',
                'image' => null,
            ],
            [
                'title' => 'HTML Tags Overview',
                'slug' => Str::slug('HTML Tags Overview'),
                'description' => 'A quick overview of common HTML tags.',
                'category_id' => 4,
                'framework_id' => 3,
                'topic_id' => 1,
                'structer_id' => 1,
                'code' => '<p>&lt;h1&gt;Heading&lt;/h1&gt;&lt;p&gt;Paragraph&lt;/p&gt;</p>',
                'image' => null,
            ],
            [
                'title' => 'CSS Basics',
                'slug' => Str::slug('CSS Basics'),
                'description' => 'Learn the basics of styling web pages using CSS.',
                'category_id' => 4,
                'framework_id' => 5,
                'topic_id' => 2,
                'structer_id' => 1,
                'code' => '<p>body { background-color: lightblue; }</p>',
                'image' => null,
            ],
            [
                'title' => 'CSS Structure',
                'slug' => Str::slug('CSS Structure'),
                'description' => 'Understand how CSS is structured.',
                'category_id' => 4,
                'framework_id' => 2,
                'topic_id' => 2,
                'structer_id' => 1,
                'code' => '<p>selector { property: value; }</p>',
                'image' => null,
            ],
            [
                'title' => 'CSS All Properties',
                'slug' => Str::slug('CSS All Properties'),
                'description' => 'List of important CSS properties for beginners.',
                'category_id' => 4,
                'framework_id' => 2,
                'topic_id' => 2,
                'structer_id' => 1,
                'code' => '<p>color, background-color, margin, padding</p>',
                'image' => null,
            ],
            [
                'title' => 'JavaScript Overview',
                'slug' => Str::slug('JavaScript Overview'),
                'description' => 'Introduction to JavaScript basics.',
                'category_id' => 4,
                'framework_id' => 3,
                'topic_id' => 3,
                'structer_id' => 1,
                'code' => '<p>console.log("Hello World");</p>',
                'image' => null,
            ],
            [
                'title' => 'JavaScript Structure',
                'slug' => Str::slug('JavaScript Structure'),
                'description' => 'Understand basic structure of JavaScript programs.',
                'category_id' => 4,
                'framework_id' => 3,
                'topic_id' => 3,
                'structer_id' => 1,
                'code' => '<p>function greet() { alert("Hi!"); }</p>',
                'image' => null,
            ],
            [
                'title' => 'JavaScript How to Use',
                'slug' => Str::slug('JavaScript How to Use'),
                'description' => 'How to embed and use JavaScript in a webpage.',
                'category_id' => 4,
                'framework_id' => 4,
                'topic_id' => 3,
                'structer_id' => 1,
                'code' => '<p>&lt;script&gt;alert("Hello");&lt;/script&gt;</p>',
                'image' => null,
            ],
            [
                'title' => 'PHP Introduction',
                'slug' => Str::slug('PHP Introduction'),
                'description' => 'Getting started with PHP programming.',
                'category_id' => 4,
                'framework_id' => 4,
                'topic_id' => 4,
                'structer_id' => 1,
                'code' => '<p>&lt;?php echo "Hello World"; ?&gt;</p>',
                'image' => null,
            ],
            [
                'title' => 'Simple PHP Structure',
                'slug' => Str::slug('Simple PHP Structure'),
                'description' => 'Understand the structure of a basic PHP program.',
                'category_id' => 1,
                'framework_id' => 2,
                'topic_id' => 4,
                'structer_id' => 1,
                'code' => '<p>&lt;?php // PHP code here ?&gt;</p>',
                'image' => null,
            ],
            [
                'title' => 'Learn PHP with OOP',
                'slug' => Str::slug('Learn PHP with OOP'),
                'description' => 'Introduction to Object-Oriented Programming in PHP.',
                'category_id' => 4,
                'framework_id' => 2,
                'topic_id' => 4,
                'structer_id' => 2,
                'code' => '<p>class Car { public $color; }</p>',
                'image' => null,
            ],
            [
                'title' => 'PHP Functions',
                'slug' => Str::slug('PHP Functions'),
                'description' => 'Understanding PHP functions and their uses.',
                'category_id' => 4,
                'framework_id' => 5,
                'topic_id' => 4,
                'structer_id' => 1,
                'code' => '<p>function greet() { return "Hello"; }</p>',
                'image' => null,
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
