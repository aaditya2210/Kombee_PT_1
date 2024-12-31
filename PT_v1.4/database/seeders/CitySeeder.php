<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\State;

class CitySeeder extends Seeder
{
    public function run()
    {
        $state = State::where('name', 'California')->first();
        City::create(['name' => 'Los Angeles', 'state_id' => $state->id]);
        City::create(['name' => 'San Francisco', 'state_id' => $state->id]);

        $state = State::where('name', 'Texas')->first();
        City::create(['name' => 'Houston', 'state_id' => $state->id]);
        City::create(['name' => 'Dallas', 'state_id' => $state->id]);

        // Add more cities as needed
    }
}
