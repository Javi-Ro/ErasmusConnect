<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_tag')->delete();

        DB::table('post_tag')->insert(
            [
                'post_id' => 1,
                'tag_id' => 2
            ]
        );

        DB::table('post_tag')->insert(
            [
                'post_id' => 1,
                'tag_id' => 4
            ]
        );

        DB::table('post_tag')->insert(
            [
                'post_id' => 3,
                'tag_id' => 1
            ]
        );

        DB::table('post_tag')->insert(
            [
                'post_id' => 4,
                'tag_id' => 3
            ]
        );

        DB::table('post_tag')->insert(
            [
                'post_id' => 5,
                'tag_id' => 1,
            ]
        );

        DB::table('post_tag')->insert(
            [
                'post_id' => 5,
                'tag_id' => 11,
            ]
        );

        DB::table('post_tag')->insert(
            [
                'post_id' => 2,
                'tag_id' => 12,
            ]
        );
    }
}
