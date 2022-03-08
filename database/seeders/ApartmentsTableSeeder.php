<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->delete();

        DB::table('countries')->insert(
            [
                'title' => 'Charles Bridge Apartments',
                'description' => 'Centrally located in Prague 1, Charles Bridge Palace is just 492 feet from the famous Charles Bridge and a 10-minute walk to the Old Town Square',
                'price' => '580',
                'address' => 'Anenske namesti 203/1, Prague, 110 00, Czech Republic',
                'bedrooms' => 2,
                'phone' => '+420 531 231 215',
                'email' => 'charlesbridgepragha@gmail.com',
                'img_url' => '',
                'surface' => '50',
                'rating' => '4.7',
                'user_id' => 1,
                'city_id' => 1
            ]
        );
        DB::table('countries')->insert(
            [
                'title' => 'COZY APARTMENT 2 MINUTES FROM IL DUOMO',
                'description' => 'Ideally located in the heart of the city and perfect for students',
                'price' => '620',
                'address' => '6 Via Festa del Perdono, Milan City Center, 20122 Milan, Italy',
                'bedrooms' => 3,
                'phone' => '+39 345 186 974',
                'email' => 'milanoapartaments@gmail.com',
                'img_url' => '',
                'surface' => '32',
                'rating' => '4.6',
                'user_id' => 1,
                'city_id' => 2
            ]
        );

        DB::table('countries')->insert(
            [
                'title' => 'The room you where looking for in Budapest',
                'description' => 'Single room suitable for university students. Shared toilet and kitchen',
                'price' => '280',
                'address' => 'Budapest, Rákóczi út 73, 1081 Hungary',
                'bedrooms' => 1,
                'phone' => '+36 254 654 259',
                'email' => 'BoriskaSzabo@gmail.com',
                'img_url' => '',
                'surface' => '32',
                'rating' => '4.4',
                'user_id' => 1,
                'city_id' => 3
            ]
        );

        DB::table('countries')->insert(
            [
                'title' => 'Room university flat in Berlin with elevator and storage room, great for medium and long stays',
                'description' => 'Single room suitable for university students. Shared toilet and kitchen',
                'price' => '250',
                'address' => 'Kreuznacher Str. 6, 14197 Berlin, Germany',
                'bedrooms' => 1,
                'phone' => '+49 643 987 336',
                'email' => 'jonasapartment33@gmail.com',
                'img_url' => '',
                'surface' => '6',
                'rating' => '3.9',
                'user_id' => 1,
                'city_id' => 4
            ]
        );

        DB::table('countries')->insert(
            [
                'title' => 'Beautiful 2 bedroom Apartment in Gdansk - pets allowed',
                'description' => 'Beautiful apartment located 600 feet from the city center',
                'price' => '523',
                'address' => ' Toruńska 15, 80-747 Gdańsk, Polska',
                'bedrooms' => 2,
                'phone' => '+45 573 654 259',
                'email' => 'marmatus@gmail.com',
                'img_url' => '',
                'surface' => '26',
                'rating' => '4.5',
                'user_id' => 1,
                'city_id' => 5
            ]
        );
    }
}
