<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),
            'title' => fake()->sentence(4, false),
            'author' => fake()->name(),
            'published_year' => fake()->numberBetween(1980, 2024),
            'stock' => fake()->numberBetween(0, 50),
        ];
    }
}
