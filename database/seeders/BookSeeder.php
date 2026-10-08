<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'category' => 'Pemrograman',
                'title' => 'Clean Code: A Handbook of Agile Software Craftsmanship',
                'author' => 'Robert C. Martin',
                'published_year' => 2008,
                'stock' => 5,
            ],
            [
                'category' => 'Pemrograman',
                'title' => 'The Pragmatic Programmer',
                'author' => 'David Thomas & Andrew Hunt',
                'published_year' => 2019,
                'stock' => 3,
            ],
            [
                'category' => 'Ilmu Komputer',
                'title' => 'Introduction to Algorithms',
                'author' => 'Thomas H. Cormen',
                'published_year' => 2022,
                'stock' => 7,
            ],
            [
                'category' => 'Basis Data',
                'title' => 'Database System Concepts',
                'author' => 'Abraham Silberschatz',
                'published_year' => 2020,
                'stock' => 4,
            ],
            [
                'category' => 'Jaringan Komputer',
                'title' => 'Computer Networking: A Top-Down Approach',
                'author' => 'James Kurose & Keith Ross',
                'published_year' => 2021,
                'stock' => 6,
            ],
            [
                'category' => 'Kecerdasan Buatan',
                'title' => 'Artificial Intelligence: A Modern Approach',
                'author' => 'Stuart Russell & Peter Norvig',
                'published_year' => 2020,
                'stock' => 2,
            ],
            [
                'category' => 'Sistem Operasi',
                'title' => 'Operating System Concepts',
                'author' => 'Abraham Silberschatz',
                'published_year' => 2018,
                'stock' => 8,
            ],
            [
                'category' => 'Matematika',
                'title' => 'Discrete Mathematics and Its Applications',
                'author' => 'Kenneth H. Rosen',
                'published_year' => 2018,
                'stock' => 10,
            ],
            [
                'category' => 'Pemrograman',
                'title' => 'Laravel: Up & Running',
                'author' => 'Matt Stauffer',
                'published_year' => 2023,
                'stock' => 5,
            ],
        ];

        foreach ($books as $bookData) {
            $category = Category::where('name', $bookData['category'])->first();
            if ($category) {
                Book::create([
                    'category_id' => $category->id,
                    'title' => $bookData['title'],
                    'author' => $bookData['author'],
                    'published_year' => $bookData['published_year'],
                    'stock' => $bookData['stock'],
                ]);
            }
        }
    }
}
