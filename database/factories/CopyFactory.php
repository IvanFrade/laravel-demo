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
        $id = null;
        do {
            $id = random_int(1000000000, 9999999999);
        } while (\App\Models\Loan::where('id', $id)->exists());

        return [
            'id' => $id,
            'book_id' => fake()->numberBetween(1, 10),
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
