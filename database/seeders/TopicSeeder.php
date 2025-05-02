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
            'CSS',
            'Java Script',
            'PHP',
            'Python',
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
