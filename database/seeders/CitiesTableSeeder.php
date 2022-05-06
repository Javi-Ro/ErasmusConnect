<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->delete();

        City::create(
            [
                'id' => 1,
                'name' => 'Praga',
                'country_id' => 1
            ]
        );

        City::create(
            [
                'id' => 2,
                'name' => 'Cracovia',
                'country_id' => 2
            ]
        );

        City::create(
            [
                'id' => 3,
                'name' => 'Budapest',
                'country_id' => 3
            ]
        );

        City::create(
            [
                'id' => 4,
                'name' => 'Oslo',
                'country_id' => 4
            ]
        );

        City::create(
            [
                'id' => 5,
                'name' => 'Liubliana',
                'country_id' => 5
            ]
        );
    }
}
