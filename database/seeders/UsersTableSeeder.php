<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
                'name' => 'Administrator',
                'nickname' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
                'description' => 'I am the administrator of ErasmusConnect',
                'city_id' => null
            ]
        );
            
        User::create(
            [
                'id' => 2,
                'name' => 'Adri el Grande',
                'nickname' => 'dsg',
                'email' => 'dsg@dsg.com',
                'password' => Hash::make('dsg'),
                'description' => 'Cuenta oficial de DSG+R^2',
                'city_id' => null
            ]
        );

        User::create(
            [
                'id' => 3,
                'name' => 'Madani el Moro',
                'nickname' => 'moro',
                'email' => 'moro@dsg.com',
                'password' => Hash::make('moro'),
                'description' => 'Cuenta oficial del moro hungaro',
                'city_id' => null
            ]
        );
    }
}
