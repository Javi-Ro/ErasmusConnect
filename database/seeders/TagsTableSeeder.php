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
                'post' => true
            ]
        );

        Tag::create(
            [
                'id' => 2,
                'name' => "fiesta",
                'post' => true
            ]
        );

        Tag::create(
            [
                'id' => 3,
                'name' => "deporte",
                'post' => false
            ]
        );

        Tag::create(
            [
                'id' => 4,
                'name' => "noche",
                'post' => false
            ]
        );
    }
}
