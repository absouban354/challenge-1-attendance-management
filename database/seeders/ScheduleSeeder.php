<?php

namespace Database\Seeders;

use Database\Factories\ScheduleFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ScheduleFactory::times(400)->create();
    }
}
