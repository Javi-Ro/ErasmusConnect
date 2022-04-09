<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use App\Models\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('countries')->delete();

        Country::create(['name' => 'Czech Republic']);
        Country::create(['name' => 'Italy']);
        Country::create(['name' => 'Hungary']);
        Country::create(['name' => 'Germany']);
        Country::create(['name' => 'Poland']);
    }
}
