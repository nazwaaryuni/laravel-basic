<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Lecturer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Lecturer>
 */
class LecturerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'department_id' => Department::inRandomOrder()->first()->id,
        ];
    }
}
