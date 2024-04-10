<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DistanceUnit;

class ActivityDistanceUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DistanceUnit::create([
            'name' => 'kilometer'
        ]);

        DistanceUnit::create([
            'name' => 'meter'
        ]);
    }
}
