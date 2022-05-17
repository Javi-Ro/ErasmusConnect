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
                'name' => 'Mario',
                'nickname' => 'mario',
                'email' => 'mario@gmail.com',
                'password' => Hash::make('mario'),
                'description' => 'Cuenta oficial de DSG+R^2',
                'city_id' => null,
                'img_url' => 'mario.jpg'
            ]
        );

        User::create(
            [
                'id' => 3,
                'name' => 'Madani',
                'nickname' => 'madani',
                'email' => 'madani@gmail.com',
                'password' => Hash::make('madani'),
                'description' => 'Cuenta oficial del moro hungaro',
                'city_id' => null,
                'img_url' => 'madani.jpg'
            ]
        );

        User::create(
            [
                'id' => 4,
                'name' => 'Ilyan Syusarchuk',
                'nickname' => 'ilyan',
                'email' => 'ilyan@dsg.com',
                'password' => Hash::make('ilyan'),
                'description' => 'Soy un estudiante de Ingeniería Informática en la universidad de Alicante. Actualmente estoy buscnado un piso en Gdansk, Polonia, donde pasar mi Erasmus el primer cuatrimestre del año que viene. Si tienes algo de información no dudes en hablarme :)',
                'city_id' => null,
                'img_url' => 'ilyan.jpg'
            ]
        );

        User::create(
            [
                'id' => 5,
                'name' => 'Rosa Rodriguez',
                'nickname' => 'rosa',
                'email' => 'rosa@gmail.com',
                'password' => Hash::make('rosa'),
                'description' => 'Estudio informática en Alicante y me fui de Erasmus a Praga el año pasado. Si tienes dudas habla conmigo',
                'city_id' => null,
                'img_url' => 'rosa.jpg'
            ]
        );

        User::create(
            [
                'id' => 6,
                'name' => 'Adri',
                'nickname' => 'adri',
                'email' => 'adri@gmail.com',
                'password' => Hash::make('adri'),
                'description' => 'Estudio informática en Alicante y me fui de Erasmus a Praga el año pasado. Si tienes dudas habla conmigo',
                'city_id' => null,
                'img_url' => 'adri.jpg'
            ]
        );
    }
}
