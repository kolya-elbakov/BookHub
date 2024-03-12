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
            'book_name' => $this->faker->sentence,
            'user_id' => $this->faker->numberBetween(1, 2),
            'author' => $this->faker->name,
            'genre' => $this->faker->word,
            'date_publication' => $this->faker->date,
            'condition' => $this->faker->numberBetween(1, 5),
        ];
    }
}
