<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('places')->insert([
            [
                'name' => 'Maldives',
                'latitude' => 123.456,
                'longitude' => 789.012,
            ],
            [
                'name' => 'Fiji',
                'latitude' => 345.678,
                'longitude' => 901.234,
            ],
            [
                'name' => 'Fiji',
                'latitude' => 335.638,
                'longitude' => 511.224,
            ]
        ]);
    }
}
