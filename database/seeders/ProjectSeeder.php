<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Management Apps',
                'description' => 'Sebuah aplikasi manajemen yang dibangun menggunakan Laravel dan Node.js.',
                'image' => 'projects/thesis.png',
                'completed_date' => '2024-03-10',
                'featured' => true,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
