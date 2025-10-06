<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StylebookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->unique()->sentence(3),
            'description' => $this->faker->optional()->paragraph(),
        ];
    }
}
