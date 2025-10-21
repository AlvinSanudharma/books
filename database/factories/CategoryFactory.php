<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $main = $this->faker->randomElement([
            'Fiction', 'Non-fiction', 'Biography', 'History', 'Science',
            'Technology', 'Business', 'Children', 'Education', 'Art',
            'Philosophy', 'Psychology', 'Health', 'Travel', 'Cooking',
            'Religion', 'Fantasy', 'Romance', 'Mystery', 'Self-Help',
        ]);

        $modifier = $this->faker->randomElement([
            'Classics', 'Modern', 'Contemporary', 'Advanced', 'Essentials',
            'Basics', 'Stories', 'Studies', 'Guide', 'Collection',
            'Series', 'Topics', 'Concepts', 'Exploration', 'Perspectives',
        ]);

        $name = $this->faker->boolean(50)
                ? "{$main} {$modifier} " . $this->faker->unique()->numberBetween(1, 999999)
                : "{$main} " . $this->faker->unique()->numberBetween(1, 999999);

        return [
            'name' => $name,
            'slug' => Str::slug($name)
        ];
    }
}
