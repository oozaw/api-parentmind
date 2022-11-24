<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            "title" => $this->faker->sentence(mt_rand(3, 7)),
            // "type" => $this->faker->randomElement(['artikel', 'video']),
            "slug" => $this->faker->unique()->slug(),
            "user_id" => mt_rand(1, 5),
            "category_id" => mt_rand(1, 4),
            "excerpt" => $this->faker->paragraphs(2, true),
            // "body" => "<p>" . implode("</p><p>", $this->faker->paragraphs(mt_rand(15, 30))) . "</p>" 
            // atau
            "body" => collect($this->faker->paragraphs(mt_rand(15, 30)))->map(fn ($p) => "<p>$p</p>")->implode("")
        ];
    }
}