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
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Blog::factory(10)->create([
            'user_id' => 1,
        ]);

        Post::factory(10)->create([
            'user_id' => 1,
            'blog_id' => 1,
        ]);

        Tag::factory(10)->create();
    }
}
