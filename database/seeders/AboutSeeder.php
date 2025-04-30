<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        About::create([
            'name' => 'Kevin Laurensius',
            'title' => 'Application Developer',
            'bio' => 'Saya adalah lulusan Teknik Informatika dengan pengalaman sebagai Back End dan Application Developer. Terampil dalam Laravel, database, analisis data, serta terbiasa membangun aplikasi dan website sesuai kebutuhan pengguna.',
            'profile_image' => 'profile.jpeg',
            'email' => 'kevinlaurensius@gmail.com',
            'phone' => '089503268539',
            'location' => 'Tangerang, Indonesia',
            'github' => 'https://github.com/kevin2541'
        ]);
    }
}
