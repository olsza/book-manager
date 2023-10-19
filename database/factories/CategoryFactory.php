<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $list = [
            'Action',
            'Adventure',
            'Autobiography',
            'Biography',
            'Business',
            'Chick lit',
            'Children\'s literature',
            'Classic literature',
            'Comic book',
            'Crime',
            'Cyberpunk',
            'Drama',
            'Erotica',
            'Family drama',
            'Fantasy',
            'Fairy tale',
            'Gothic fiction',
            'Health and wellness',
            'Historical fiction',
            'Historical romance',
            'Horror',
            'Humor',
            'Instructional',
            'Legal thriller',
            'Literary fiction',
            'Mystery',
            'Mythology',
            'Philosophy',
            'Poetry',
            'Political thriller',
            'Post-apocalyptic',
            'Psychology',
            'Romance',
            'Satire',
            'Science',
            'Science fiction',
            'Self-help',
            'Short stories',
            'Spy thriller',
            'Surrealism',
            'Supernatural',
            'Thriller',
            'Time travel',
            'Travel',
            'Travel guide',
            'Utopian fiction',
            'Western',
        ];

        return [
            'name' => $this->faker->unique()->randomElement($list),
        ];
    }
}
