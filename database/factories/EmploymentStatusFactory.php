<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmploymentStatus>
 */
class EmploymentStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $employment_status = $this->faker->randomElement(['Regular', 'Casual', 'Project', 'Seasonal', 'Fixed-term', 'Probationary']);
        
        return [
            'code' => $employment_status,
            'description' => $this->faker->text()
        ];
    }
}
