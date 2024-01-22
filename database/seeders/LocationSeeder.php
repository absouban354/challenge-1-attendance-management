<?php

namespace Database\Seeders;

use Database\Factories\LocationFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        LocationFactory::times(20)->create();
    }
}
