<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        $course = Course::create([
            'title' => 'Basic HTML',
            'description' => 'Learn the foundations of HTML.',
        ]);

        $course->lessons()->createMany([
            [
                'title' => 'What is HTML?',
                'content' => 'HTML stands for HyperText Markup Language...',
                'order' => 1,
            ],
            [
                'title' => 'Headings and paragraphs',
                'content' => 'Using h1–h6 and p tags...',
                'order' => 2,
            ],
        ]);

        $course2 = Course::create([
            'title' => 'Intro to CSS',
            'description' => 'Style your web pages with CSS.',
        ]);

        $course2->lessons()->createMany([
            [
                'title' => 'Selectors',
                'content' => 'Target elements with CSS selectors...',
                'order' => 1,
            ],
            [
                'title' => 'Colors and backgrounds',
                'content' => 'Working with colors, gradients, backgrounds...',
                'order' => 2,
            ],
        ]);
    }
}
