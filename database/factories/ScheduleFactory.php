<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Location;
use App\Models\Shift;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $order = 600000;
    public function definition(): array
    {
        return [
            //
            'employee_id'=> self::$order++,
            'location_id'=> fake()->numberBetween(Location::orderBy('id')->value('id'), Location::orderByDesc('id')->value('id')),
            'shift_id'=> fake()->numberBetween(Shift::orderBy('id')->value('id'), Shift::orderByDesc('id')->value('id')),
        ];
    }
}
