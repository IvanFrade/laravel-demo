<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'isbn' => fake()->numberBetween(1000000000000, 9999999999999),
            'title' => fake()->word(),
            'author' => fake()->name(),
            'publisher' => fake()->word(),
            'year' => fake()->numberBetween(1800, 2025),
            'description' => fake()->text(),
            'cover_image' => '/img/test.jpg',
            'genre_id' => fake()->numberBetween(1, 5),
        ];
    }
}
