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
        // পুরাতন সব ডেটা মুছে নতুন করে ইনসার্ট
        Structer::truncate();

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

        foreach ($structers as $name) {
            Structer::create([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
        }
    }
}
