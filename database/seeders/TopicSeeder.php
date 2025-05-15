<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Topic::query()->delete();

        $topics = [
            'HTML' => <<<EOD
<p>HTML is the standard markup language for Web pages.</p>
<p>With HTML you can create your own Website.</p>
<p>HTML is easy to learn - You will enjoy it!</p>
EOD,

            'CSS' => <<<EOD
<p>CSS is the language we use to style an HTML document.</p>
<p>CSS describes how HTML elements should be displayed.</p>
<p>This tutorial will teach you CSS from basic to advanced.</p>
EOD,

            'Java Script' => <<<EOD
<p>JavaScript is the world's most popular programming language.</p>
<p>JavaScript is the programming language of the Web.</p>
<p>JavaScript is easy to learn.</p>
<p>This tutorial will teach you JavaScript from basic to advanced.</p>
EOD,

            'PHP' => <<<EOD
<p>PHP is a server scripting language, and a powerful tool for making dynamic and interactive Web pages.</p>
<p>PHP is a widely-used, free, and efficient alternative to competitors such as Microsoft's ASP.</p>
EOD,

            'Python' => <<<EOD
<p>Python is a popular programming language.</p>
<p>Python can be used on a server to create web applications.</p>
EOD,

            'Dart' => <<<EOD
<p>Dart is a client-optimized language for fast apps on any platform, often used with Flutter.</p>
EOD,

            'SQL' => <<<EOD
<p>SQL is a standard language for storing, manipulating and retrieving data in databases.</p>
<p>Our SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.</p>
EOD,

            'MongoDB' => <<<EOD
<p>MongoDB is a document database. It stores data in a type of JSON format called BSON.</p>
<p>If you are unfamiliar with JSON, check out our JSON tutorial.</p>
<p>A record in MongoDB is a document, which is a data structure composed of key-value pairs similar to the structure of JSON objects.</p>
EOD,
        ];

        foreach ($topics as $name => $description) {
            Topic::create([
                'name'        => $name,
                'slug'        => Str::slug($name),
                'description' => $description,
            ]);
        }
    }
}
