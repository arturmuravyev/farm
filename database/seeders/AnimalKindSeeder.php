<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalKindSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animal_kinds')->insert([
            'kind' => 'cat',
            'max_size' => 50,
            'max_age' => 20,
	    'growth_factor' => 1.3,
        ]);
	DB::table('animal_kinds')->insert([
            'kind' => 'dog',
            'max_size' => 70,
            'max_age' => 15,
	    'growth_factor' => 1.5,
        ]);
	DB::table('animal_kinds')->insert([
            'kind' => 'python',
            'max_size' => 125,
            'max_age' => 35,
	    'growth_factor' => 1.9,
        ]);
	DB::table('animal_kinds')->insert([
            'kind' => 'elephant',
            'max_size' => 250,
            'max_age' => 25,
	    'growth_factor' => 3.1,
        ]);
    }
}
