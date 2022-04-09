<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class FriendsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_user')->delete();

        DB::table('user_user')->insert(
            [
                'user_id' => 1,
                'user2_id' => 2
            ]
        );

        DB::table('user_user')->insert(
            [
                'user_id' => 1,
                'user2_id' => 3
            ]
        );

        DB::table('user_user')->insert(
            [
                'user_id' => 2,
                'user2_id' => 4
            ]
        );

        DB::table('user_user')->insert(
            [
                'user_id' => 3,
                'user2_id' => 5
            ]
        );

        DB::table('user_user')->insert(
            [
                'user_id' => 2,
                'user2_id' => 3
            ]
        );
    }
}
