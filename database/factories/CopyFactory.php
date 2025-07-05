<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Copy>
 */
class CopyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' => fake()->numberBetween(1, 6),
            'condition' => array_rand(array_flip([
                'ottima',
                'buona',
                'accettabile',
            ]), 1),
            'available'=> 1,
            'notes' => fake()->text(50),
        ];
    }
}
