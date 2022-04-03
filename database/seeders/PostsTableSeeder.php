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
                'text' => 'Praga es una de las ciudades mas bonitas que he conocido. Abro un foro para que podais hablar acerca de los mejores sitios de esta increible ciudad',
                'img_url' => 'ejemplo-praga.jpeg'
            ]
        );

        Post::create(
            [
                'id' => 2,
                'title' => "Aqui en Eslovenia",
                'user_id' => 1,
                'text' => 'Viva Eslovenia. No os recomiendo ir en 2023 ya que estara Vicente robando gatitas',
                'img_url' => 'ejemplo-eslovenia.jpeg'
            ]
        );

        Post::create(
            [
                'id' => 3,
                'title' => "Hola desde Munich",
                'user_id' => 2,
                'text' => 'Muchas alemanas, mucha cerveza y muchas salchichas',
                'img_url' => 'ejemplo-munich.jpeg'
            ]
        );

        Post::create(
            [
                'id' => 4,
                'title' => "Experiencias en Oslo",
                'user_id' => 4,
                'text' => 'Solo hay Teslas, una cerveza cuesta un riñon. No vi ninguna aurora boreal, decepcionante. En fin, mucho frio y tampoco hay pinguinos por la calle :(',
                'img_url' => 'ejemplo-oslo.jpeg'
            ]
        );
    }
}
