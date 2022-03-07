<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        DB::table('posts')->delete();

        DB::table('posts')->insert(
            [
                'id' => 1,
                'title' => "Mi etapa en Praga",
                'date_of_publication' => Carbon::parse('2021-12-01'),
                'user_id' => 1
            ]
        );

        DB::table('posts')->insert(
            [
                'id' => 2,
                'title' => "Aqui en Eslovenia",
                'date_of_publication' => Carbon::parse('2021-11-04'),
                'user_id' => 1
            ]
        );

        DB::table('posts')->insert(
            [
                'id' => 3,
                'title' => "Hola desde Munich",
                'date_of_publication' => Carbon::parse('2022-03-01'),
                'user_id' => 2
            ]
        );

        DB::table('posts')->insert(
            [
                'id' => 4,
                'title' => "Experiencias en Oslo",
                'date_of_publication' => Carbon::parse('2021-09-07'),
                'user_id' => 4
            ]
        );
    }
}
