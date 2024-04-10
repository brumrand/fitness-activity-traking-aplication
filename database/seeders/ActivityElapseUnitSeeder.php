<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ElapsedTimeUnit;

class ActivityElapseUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ElapsedTimeUnit::create([
            'name' => 'hour'
        ]);

        ElapsedTimeUnit::create([
            'name' => 'minute'
        ]);
    }
}
