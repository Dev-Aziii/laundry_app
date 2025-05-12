<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $positions = ['Store Clerk', 'Driver', 'Laundry Attendant', 'Worker'];

        for ($i = 0; $i < 5; $i++) {
            Employee::create([
                'employee_id' => 'E' . strtoupper(Str::random(6)),
                'name' => fake()->name(),
                'position' => fake()->randomElement($positions),
                'hire_date' => fake()->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
                'salary' => fake()->numberBetween(20000, 80000),
                'status' => fake()->randomElement(['Active', 'Inactive']),
            ]);
        }
    }
}
