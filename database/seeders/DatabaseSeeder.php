<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\User;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create a test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create 5 users for demonstration
        $users = User::factory(5)->create();

        // Create 5 blogs for each user and collect them
        $blogs = Blog::factory(5)->create([
            'user_id' => $users->random()->id,          // Assign a random user ID to each blog
        ]);

        // Create 5 posts for each blog
        foreach ($blogs as $blog) {
            Post::factory(5)->create([
                'user_id' => $blog->user_id,            // Use the same user who created the blog
                'blog_id' => $blog->id,                 // Associate posts with the current blog
            ]);
        }

        // Create 10 tags
        Tag::factory(10)->create();
    }
}
