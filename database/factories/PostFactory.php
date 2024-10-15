<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\User;
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
    public function definition(): array
    {
        return [
            'title'=> fake()->name(),
            'content'=> fake()->name(),
            'attachment'=> fake()->name(),
            'user_id' => User::factory(), // Create a user for each post
            'blog_id' => Blog::factory(), // Create a blog for each post
        ];
    }
}
