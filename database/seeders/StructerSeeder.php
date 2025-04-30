<?php

namespace Database\Seeders;

use App\Models\Structer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StructerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
   
        Structer::query()->delete();


        $structers = [
            'Procedural Structure',
            'OOP',
            'Functional Structure',
            'Hierarchical Database Structure',
            'Relational Database Structure',
            'Document-Based Database (NoSQL)',
            'Key-Value Database',
            'Graph Database',
            'MVC',
        ];

        foreach ($structers as $name) {
            Structer::create([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        }
    }
}
