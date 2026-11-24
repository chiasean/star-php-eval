<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(6);

        return [
            'title' => $title,
            'summary' => fake()->paragraph(2),
            'body' => fake()->paragraphs(8, true),
            'published_at' => fake()->optional(0.8)->dateTimeBetween('-1 year', 'now'),
            'permalink' => Str::slug($title).'-'.fake()->unique()->numberBetween(1000, 999999),
            'status' => fake()->randomElement(['draft', 'published']),
            'thumbnail_url' => fake()->imageUrl(800, 450),
            'category_id' => Category::factory(),
        ];
    }
}
