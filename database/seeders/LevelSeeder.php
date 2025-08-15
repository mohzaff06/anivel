<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            [
                'name' => 'Beginner',
                'description' => 'Perfect for those just starting with animation. Covers the basic principles and techniques.',
            ],
            [
                'name' => 'Intermediate',
                'description' => 'For animators with some experience. Builds on basic knowledge with more advanced concepts.',
            ],
            [
                'name' => 'Advanced',
                'description' => 'Complex animation techniques and professional workflows for experienced animators.',
            ],
            [
                'name' => 'Expert',
                'description' => 'Cutting-edge animation techniques and industry-specific best practices.',
            ],
        ];

        foreach ($levels as $level) {
            Level::create($level);
        }
    }
}
