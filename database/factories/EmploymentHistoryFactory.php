<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Employee;
use App\Models\EmploymentStatus;
use App\Models\Position;
use App\Models\Rank;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmploymentHistory>
 */
class EmploymentHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'employee_id' => Employee::all()->random()->id,
            'employment_status' => EmploymentStatus::all()->random()->id,
            'department_id' => Department::all()->random()->id,
            'position_id' => Position::all()->random()->id,
            'rank_id' => Rank::all()->random()->id,
            'effective_date' => fake()->date(),
            'immediate_supervisor' => Employee::all()->random()->id
        ];
    }
}
