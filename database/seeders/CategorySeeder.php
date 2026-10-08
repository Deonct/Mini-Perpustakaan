<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Pemrograman', 'description' => 'Buku-buku mengenai bahasa pemrograman, algoritma, dan rekayasa perangkat lunak.'],
            ['name' => 'Ilmu Komputer', 'description' => 'Fondasi teoritis ilmu komputer, struktur data, dan arsitektur sistem.'],
            ['name' => 'Jaringan Komputer', 'description' => 'Konsep jaringan, protokol komunikasi, dan keamanan siber.'],
            ['name' => 'Basis Data', 'description' => 'Perancangan basis data, SQL, dan sistem manajemen basis data.'],
            ['name' => 'Kecerdasan Buatan', 'description' => 'Machine learning, deep learning, dan penerapan AI.'],
            ['name' => 'Sistem Operasi', 'description' => 'Prinsip dan implementasi sistem operasi modern.'],
            ['name' => 'Matematika', 'description' => 'Matematika diskrit, kalkulus, dan aljabar linear untuk sains.'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
