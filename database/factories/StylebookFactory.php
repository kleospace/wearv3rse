<?php

namespace Database\Factories;

use App\Models\{Stylebook, User};
use Illuminate\Database\Eloquent\Factories\Factory;

class StylebookFactory extends Factory
{
    protected $model = Stylebook::class;

    public function definition(): array {
        return [
            'user_id'     => User::factory(),
            'title'       => $this->faker->unique()->sentence(3),
            'description' => $this->faker->optional()->paragraph(),
        ];
    }
}
