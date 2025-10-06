<?php

namespace Database\Factories;

use App\Models\{Comment, User};
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'user_id'      => User::factory(),
            'stylebook_id' => null,
            'article_id'   => null,
            'text'         => $this->faker->sentence(),
        ];
    }
}
