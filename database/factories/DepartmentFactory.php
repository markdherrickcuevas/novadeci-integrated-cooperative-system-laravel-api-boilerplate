<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->sentence(),
            'description' => $this->faker->text(),
            'head_name' => $this->faker->unique()->name(),
            'branch_code' => Branch::all()->random()->id,
        ];
    }
}
