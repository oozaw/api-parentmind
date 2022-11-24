<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        return [
            "name" => $this->faker->words(mt_rand(1, 2), true),
            "slug" => $this->faker->unique()->slug(mt_rand(1, 2))
        ];
    }
}
