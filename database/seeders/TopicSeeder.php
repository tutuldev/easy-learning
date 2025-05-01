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
            'HTML',
            'PHP',
            'CSS',
            'Python',
            'Java Script',
            'Dart',
            'SQL',
            'MongoDB',


        ];

        foreach ($topics as $name) {
            Topic::create([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        }
    }
}
