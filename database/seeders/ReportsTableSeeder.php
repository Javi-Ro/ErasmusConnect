<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('reports')->delete();

        \DB::table('reports')->insert(
            [
                'title' => "Report for abuse",
                'text' => "This user abused me on this post",
                'post_id' => 1,
                'user_id' => 1
            ]
        );

        \DB::table('reports')->insert(
            [
                'title' => "Report for bad word",
                'text' => "This post has bad words",
                'post_id' => 3,
                'user_id' => 2
            ]
        );
    }
}
