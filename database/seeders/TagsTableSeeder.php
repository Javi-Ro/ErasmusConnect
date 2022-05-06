<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use App\Models\Tag;

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

        Tag::create(
            [
                'id' => 1,
                'name' => "comida",
                'post' => true,
                'img_url' => "/images/restaurant.svg"
            ]
        );

        Tag::create(
            [
                'id' => 2,
                'name' => "fiesta",
                'post' => true,
                'img_url' => "/images/fiesta.svg"
            ]
        );

        Tag::create(
            [
                'id' => 3,
                'name' => "deporte",
                'post' => true,
                'img_url' => "/images/sports.svg"
            ]
        );

        Tag::create(
            [
                'id' => 4,
                'name' => "noche",
                'post' => true,
                'img_url' => "/images/noche.svg"
            ]
        );

        Tag::create(
            [
                'id' => 5,
                'name' => "plancha",
                'post' => false
            ]
        );

        Tag::create(
            [
                'id' => 6,
                'name' => "lavavajillas",
                'post' => false
            ]
        );

        Tag::create(
            [
                'id' => 7,
                'name' => "lavadora",
                'post' => false
            ]
        );

        Tag::create(
            [
                'id' => 8,
                'name' => "garaje",
                'post' => false
            ]
        );

        Tag::create(
            [
                'id' => 9,
                'name' => "se permite fumar",
                'post' => false
            ]
        );

        Tag::create(
            [
                'id' => 10,
                'name' => "se permiten mascotas",
                'post' => false
            ]
        );

        Tag::create(
            [
                'id' => 11,
                'name' => "vida social",
                'post' => true,
                'img_url' => "/images/vida-social.svg"
            ]
        );

        Tag::create(
            [
                'id' => 12,
                'name' => "viajes",
                'post' => true,
                'img_url' => "/images/viajes.svg"
            ]
        );

        Tag::create(
            [
                'id' => 13,
                'name' => "compras",
                'post' => true,
                'img_url' => "/images/compras.svg"
            ]
        );
    }
}
