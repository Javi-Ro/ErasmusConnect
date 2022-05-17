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

        Country::create(['name' => 'República Checa']);
        Country::create(['name' => 'Polonia']);
        Country::create(['name' => 'Hungría']);
        Country::create(['name' => 'Noruega']);
        Country::create(['name' => 'Eslovenia']);
    }
}
