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
            'ASP.NET Core' => <<<EOD
<p>A cross-platform, high-performance framework for building modern, cloud-based web applications.</p>
<p>ASP stands for Active Server Pages.</p>
<p>ASP is a development framework for building web pages.</p>
EOD,

            'Spring Boot' => <<<EOD
<p>An extension of the Spring framework that simplifies the development of production-ready Java apps.</p>
EOD,

            'Express.js' => <<<EOD
<p>A minimal and flexible Node.js web application framework for building APIs and web apps.</p>
EOD,

            'Django' => <<<EOD
<p>Django is a back-end server-side web framework.</p>
<p>Django is free, open source and written in Python.</p>
<p>Django makes it easier to build web pages using Python.</p>
EOD,

            'Ruby on Rails' => <<<EOD
<p>A full-stack web application framework written in Ruby following the MVC pattern.</p>
EOD,

            'Lavarel' => <<<EOD
<p>A PHP web application framework with expressive, elegant syntax and robust features.</p>
EOD,

            'FastAPI' => <<<EOD
<p>A modern, fast web framework for building APIs with Python 3.7+ based on standard Python type hints.</p>
EOD,

            'Flutter' => <<<EOD
<p>An open-source UI software development toolkit by Google used to build cross-platform apps.</p>
EOD,

            'React' => <<<EOD
<p>React is a JavaScript library for building user interfaces.</p>
<p>React is used to build single-page applications.</p>
<p>React allows us to create reusable UI components.</p>
EOD,

            'Vue' => <<<EOD
<p>Vue is a popular JavaScript framework.</p>
<p>User interfaces built in Vue update automatically when data changes.</p>
<p>Vue is easy to learn.</p>
EOD,
        ];

        foreach ($frameworks as $name => $description) {
            Framework::create([
                'name'        => $name,
                'slug'        => Str::slug($name),
                'description' => $description,
            ]);
        }
    }
}
