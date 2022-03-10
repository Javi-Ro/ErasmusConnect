<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create(
            [
                'id' => 1,
                'name' => 'User1',
                'nickname' => 'Nick1',
                'img_url' => '1',
                'email' => 'hola1@gmail.com',
                'password' => 'contra1',
                'description' => 'i am good1',
                'city_id' => 1
            ]
        );
            
        User::create(
            [
                'id' => 2,
                'name' => 'User2',
                'nickname' => 'Nick2',
                'img_url' => '2',
                'email' => 'hola2@gmail.com',
                'password' => 'contra2',
                'description' => 'i am good2',
                'city_id' => 2
            ]
        );
            
        User::create(
            [
                'id' => 3,
                'name' => 'User3',
                'nickname' => 'Nick3',
                'img_url' => '3',
                'email' => 'hola3@gmail.com',
                'password' => 'contra3',
                'description' => 'i am good3',
                'city_id' => 3
            ]
        );
            
        User::create(
            [
                'id' => 4,
                'name' => 'User4',
                'nickname' => 'Nick4',
                'img_url' => '4',
                'email' => 'hola4@gmail.com',
                'password' => 'contra4',
                'description' => 'i am good4',
                'city_id' => 4
            ]
        );
            
        User::create(
            [
                'id' => 5,
                'name' => 'User5',
                'nickname' => 'Nick5',
                'img_url' => '5',
                'email' => 'hola5@gmail.com',
                'password' => 'contra5',
                'description' => 'i am good5',
                'city_id' => 5
            ]
        );
    }
}
