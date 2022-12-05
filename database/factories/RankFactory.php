<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rank>
 */
class RankFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $level = $this->faker->randomElement(['Junior', 'Mid', 'Senior']);

        return [
            'code' => $this->faker->unique()->sentence(),
            'description' => $this->faker->text(),
            'level' => $level
        ];
    }
}
