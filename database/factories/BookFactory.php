<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $prefixes = [
            'The Art of', 'Chronicles of', 'Rise of', 'Legacy of', 'Guide to',
            'Journey to', 'Secrets of', 'Power of', 'Tales from', 'Voices of',
            'Beyond the', 'Inside the', 'Understanding', 'Exploring the',
        ];

        $subjects = [
            'Dreams', 'Destiny', 'Science', 'Technology', 'History', 'Love',
            'Freedom', 'Life', 'Mystery', 'Power', 'Adventure', 'Empire',
            'Future', 'Mind', 'Wisdom', 'Revolution', 'Shadow', 'Light',
            'Hope', 'Time', 'World', 'Universe', 'Kingdom', 'Knowledge',
        ];

         $title = $this->faker->randomElement($prefixes)
            . ' '
            . $this->faker->randomElement($subjects)
            . ' ' 
            . $this->faker->unique()->numberBetween(1, 100000);

        return [
            'category_id' => Category::inRandomOrder()->value('id') ?? 1,
            'author_id' => User::inRandomOrder()->value('id') ?? 1,
            'title' => $title,
            'slug' => Str::slug($title),
            'publisher' => $this->faker->company,
            'voter' => $this->faker->numberBetween(1, 10),
            'publication_year' => $this->faker->dateTimeBetween('1980-01-01', '2025-12-31')->format('Y-m-d'),
        ];
    }
}
