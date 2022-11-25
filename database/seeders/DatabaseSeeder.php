<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\PostCategory;
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

        Post::factory(14)->create();

        PostCategory::factory(40)->create();

        Category::create([
            "name" => "Laki-laki",
            "slug" => "laki-laki"
        ]);

        Category::create([
            "name" => "Perempuan",
            "slug" => "perempuan"
        ]);

        Category::create([
            "name" => "1-2 th",
            "slug" => "1-2th"
        ]);

        Category::create([
            "name" => "3-4 th",
            "slug" => "3-4th"
        ]);

        Category::create([
            "name" => "5-6 th",
            "slug" => "5-6th"
        ]);

        Category::create([
            "name" => "7-12 th",
            "slug" => "7-12th"
        ]);

        Category::create([
            "name" => "13-16 th",
            "slug" => "13-16th"
        ]);

        Category::create([
            "name" => "17-21 th",
            "slug" => "17-21th"
        ]);
    }
}