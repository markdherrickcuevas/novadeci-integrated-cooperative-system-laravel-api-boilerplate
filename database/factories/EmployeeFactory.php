<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = fake()->randomElement(['male', 'female']);
        $civil_status = fake()->randomElement(['single', 'married', 'separated', 'widowed']);
        $blood_type = fake()->randomElement(['a+', 'a-', 'b+', 'b-', 'o+', 'o-', 'ab+', 'ab-']);

        return [
            'employee_id' => '0000000001',
            'firstname' => fake()->firstName($gender),
            'middlename' => fake()->name(),
            'lastname' => fake()->lastName(),
            'suffix' => null,
            'nickname' => fake()->name($gender),
            'dob' => fake()->date(),
            'gender' => 'male',
            'religion' => 'Catholic',
            'email' => fake()->safeEmail(),
            'mobile' => '09999999999',
            'civil_status' => $civil_status,
            'name_of_spouse' => fake()->name('female'),
            'total_num_of_children' => fake()->randomDigitNotNull(),
            'blood_type' => $blood_type,
            'date_hired' => fake()->date(),
            'position' => fake()->jobTitle(),
            'pagibig_no' => '0000-0000-0000',
            'sss_no' => '00-0000000-0',
            'tin_no' => '000-000-000-0000',
            'philhealth_no' => '00-000000000-0',
        ];
    }
}
