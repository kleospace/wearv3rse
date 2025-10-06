<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'author_id' => User::factory(),
            'is_public' => $this->faker->boolean(80),
            'title'     => $this->faker->sentence(4),
            'content'   => $this->faker->paragraphs(2, true),
        ];
    }
}
