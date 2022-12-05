<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Employee::factory(1)->create();

        \App\Models\Branch::factory(5)->create();
        \App\Models\Department::factory(5)->create();
        \App\Models\Rank::factory(5)->create();
        \App\Models\Position::factory(5)->create();
        \App\Models\EmploymentStatus::factory(5)->create();
        \App\Models\EmploymentHistory::factory(5)->create();

        \App\Models\User::factory(1)->create();
        \App\Models\Item::factory(250)->create();
    }
}
