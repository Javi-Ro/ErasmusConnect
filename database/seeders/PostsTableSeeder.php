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
                'user_id' => 1
            ]
        );

        Post::create(
            [
                'id' => 2,
                'title' => "Aqui en Eslovenia",
                'user_id' => 1
            ]
        );

        Post::create(
            [
                'id' => 3,
                'title' => "Hola desde Munich",
                'user_id' => 2
            ]
        );

        Post::create(
            [
                'id' => 4,
                'title' => "Experiencias en Oslo",
                'user_id' => 4
            ]
        );
    }
}
