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
    private static $emp_id = 600000;
    public function definition(): array
    {
        return [
            'id'=>self::$emp_id++,
            'name' => fake()->name(),
            'designation' => fake()->jobTitle()
        ];
    }
}
