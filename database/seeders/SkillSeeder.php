<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'PHP', 'proficiency' => 80, 'category' => 'backend'],
            ['name' => 'Laravel', 'proficiency' => 80, 'category' => 'backend'],
            ['name' => 'MySQL', 'proficiency' => 80, 'category' => 'database'],
            ['name' => 'JavaScript', 'proficiency' => 70, 'category' => 'frontend'],
            ['name' => 'HTML/CSS', 'proficiency' => 80, 'category' => 'frontend'],
            ['name' => 'Git', 'proficiency' => 70, 'category' => 'tools'],
            ['name' => 'Node.js', 'proficiency' => 60, 'category' => 'backend'],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
