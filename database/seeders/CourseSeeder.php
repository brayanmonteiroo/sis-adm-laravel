<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        if (!Course::where('name', 'Curso de Laravel')->first()) {
            Course::create([
                'name' => 'Curso de Laravel',
                'price' => 197.43,
            ]);
        }

        if (!Course::where('name', 'Curso de PHP Orientado a Objetos')->first()) {
            Course::create([
                'name' => 'Curso de PHP Orientado a Objetos',
                'price' => 247.43,
            ]);
        }
    }
}
