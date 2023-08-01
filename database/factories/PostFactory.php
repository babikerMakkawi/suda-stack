<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->unique()->paragraph(1);

        return [
            'user_id' => rand(1,10),
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => fake()->paragraph(1),
            'body' => fake()->paragraph(2),
            'status_id' => rand(1,4),
            'category_id' => rand(1,6),
        ];
    }
}
