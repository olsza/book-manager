<?php

namespace Database\Factories;

use App\Models\Category;
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
            'title' => $this->faker->sentence($this->faker->numberBetween(1, 5)),
            'author' => $this->faker->name,
            'short_description' => $this->faker->text($this->faker->numberBetween(100, 250)),
            'number_available' => $this->faker->numberBetween(0, 100),
            'publication_year' => $this->faker->numberBetween(1800, 2023),
            'category_id' => function () {
                return Category::inRandomOrder()->first()?->id;
            },
        ];
    }
}
