<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class testTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * 
     */

    

public function run()
{
    DB::table('test')->insert([
        [
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make(Str::random(8)),
            'contact_number' => mt_rand(1000000000, 9999999999),
        ],

    ]);
}

}
