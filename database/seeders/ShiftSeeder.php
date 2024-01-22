<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('shifts')->insert([
            [
            'shift_name' => 'Early Morning',
            'start_time' => '07:00:00',
            'end_time' => '16:00:00',
        ],
        [
            'shift_name' => 'Afternoon',
            'start_time' => '12:00:00',
            'end_time' => '09:00:00',
        ],
        [
            'shift_name' => 'Evening',
            'start_time' => '16:00:00',
            'end_time' => '01:00:00',
        ],
        [
            'shift_name' => 'Night',
            'start_time' => '22:00:00',
            'end_time' => '07:00:00',
        ]
        ]);
    }
}
