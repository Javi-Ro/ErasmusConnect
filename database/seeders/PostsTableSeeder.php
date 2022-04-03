<?php

namespace Database\Seeders;

use DB;
use App\Models\Post;
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

        Post::create(
            [
                'id' => 1,
                'title' => "Mi etapa en Praga",
                'user_id' => 1,
                'img_url' => "ejemplo-praga.jpeg",
                'text' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
            ]
        );

        Post::create(
            [
                'id' => 2,
                'title' => "Aqui en Eslovenia",
                'user_id' => 1,
                'img_url' => "ejemplo-eslovenia.jpeg",
                'text' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
            ]
        );

        Post::create(
            [
                'id' => 3,
                'title' => "Hola desde Munich",
                'user_id' => 2,
                'img_url' => "ejemplo-munich.jpeg",
                'text' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
            ]
        );

        Post::create(
            [
                'id' => 4,
                'title' => "Experiencias en Oslo",
                'user_id' => 4,
                'img_url' => "ejemplo-oslo.jpeg",
                'text' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
            ]
        );
    }
}
