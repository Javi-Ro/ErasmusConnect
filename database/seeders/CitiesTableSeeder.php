<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

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

        DB::table('cities')->insert(
            [
                'id' => 1,
                'name' => 'Prague',
                'country_id' => 1
            ]
        );
            
        DB::table('cities')->insert(
            [
                'id' => 2,
                'name' => 'Milan',
                'country_id' => 2
            ]
        );
            
        DB::table('cities')->insert(
            [
                'id' => 3,
                'name' => 'Budapest',
                'country_id' => 3
            ]
        );  
            
        DB::table('cities')->insert(
            [
                'id' => 4,
                'name' => 'Berlin',
                'country_id' => 4
            ]
        );
            
        DB::table('cities')->insert(
            [
                'id' => 5,
                'name' => 'Gdansk',
                'country_id' => 5
            ]
        );   
    }
}
