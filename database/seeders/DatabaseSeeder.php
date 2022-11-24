<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        User::create([
            'name' => 'Wahyu Purnomo Ady',
            'username' => 'wahyuady_',
            'email' => 'wahyu@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::factory(5)->create();


        Post::factory(21)->create();

        Category::create([
            "name" => "Programming",
            "slug" => "programming"
        ]);

        Category::create([
            "name" => "Health",
            "slug" => "health"
        ]);

        Category::create([
            "name" => "Daily Tips",
            "slug" => "daily-tips"
        ]);

        Category::create([
            "name" => "Technology",
            "slug" => "technology"
        ]);

        // Category::factory(3)->create();
    }
}