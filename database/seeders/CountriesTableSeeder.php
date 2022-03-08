<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

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

        DB::table('countries')->insert(
            [
                'name' => 'Czech Republic'
            ]
        );

        DB::table('cities')->insert(
            [
                'name' => 'Italy'
            ]
        );

        DB::table('cities')->insert(
            [
                'name' => 'Hungary'
            ]
        );

        DB::table('cities')->insert(
            [
                'name' => 'Germany'
            ]
        );

        DB::table('cities')->insert(
            [
                'name' => 'Poland'
            ]
        );
    }
}
