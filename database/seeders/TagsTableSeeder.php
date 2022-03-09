<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->delete();

        DB::table('tags')->insert(
            [
                'id' => 1,
                'name' => "comida",
                'post' => true
            ]
        );

        DB::table('tags')->insert(
            [
                'id' => 2,
                'name' => "fiesta",
                'post' => true
            ]
        );

        DB::table('tags')->insert(
            [
                'id' => 3,
                'name' => "deporte",
                'post' => false
            ]
        );

        DB::table('tags')->insert(
            [
                'id' => 4,
                'name' => "noche",
                'post' => false
            ]
        );
    }
}
