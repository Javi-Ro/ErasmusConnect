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
                'title' => "La mejor discoteca de Europa",
                'user_id' => 3,
                'text' => 'Los bares en ruinas son el principal atractivo de la vida nocturna en Budapest generalmente se encuentran en edificios identificados por ser construcciones antiguas con entradas un poco escondidas y nada llamativas, pero al ingresar se aprecia una atmosfera perfecta para pasar una buena noche. En este articulo hablare de Morrisons 2 ubicado en 1055 Budapest, Szent Istvan krt 11 cerca de la estación Jászai Mari ter del tranvía.
                Hay unas 6 salas y en cada una tienen ambiente donde ponen algo de reggaeton y música variada.',
                'img_url' => 'fiesta.jpg',
                'city_id' => 3
            ]
        );

        Post::create(
            [
                'id' => 2,
                'title' => "Quién se viene a Eslovenia??",
                'user_id' => 2,
                'text' => 'Hola, estoy buscando a gente que vaya a Liubliana el año que viene. Sobre todo me interesa saber si os vais a pillar un piso o una residencia :)',
                'img_url' => 'ejemplo-eslovenia.jpg',
                'city_id' => 5
            ]
        );

        Post::create(
            [
                'id' => 3,
                'title' => " ",
                'user_id' => 5,
                'text' => 'Holaaaa!! Yo voy el año que viene a un piso compartido. Pásame tu whatsapp y hablamos',
                'post_id' => 2,
                'city_id' => 5
            ]
        );

        Post::create(
            [
                'id' => 4,
                'title' => "Experiencias en Oslo",
                'user_id' => 3,
                'text' => 'Solo hay Teslas, una cerveza cuesta un riñon. No vi ninguna aurora boreal, decepcionante. En fin, mucho frio y tampoco hay pinguinos por la calle :(',
                'img_url' => 'ejemplo-oslo.jpg',
                'city_id' => 4
            ]
        );

        Post::create(
            [
                'id' => 5,
                'title' => "Teneis que probar esto!!! ",
                'user_id' => 4,
                'text' => 'Os recomiendo la lasaña de pulled pork de MANEKIN!! Una delicia por menos de 5€',
                'img_url' => 'comida.jpg',
                'city_id' => 2
            ]
        );

        Post::create(
            [
                'id' => 6,
                'title' => "Mi excursión a Auschwitz ",
                'user_id' => 6,
                'text' => 'Ir desde Cracovia es muy sencillo. De hecho, desde nuestra parada de buses, Miasteczko Studenckie, salen buses que van directo a Oswiecim -nombre polaco de Auschwitz- pero considero que lo mejor es ir a la estación de buses, en Galería Krakowska, y comprar el pasaje directamente. Al igual que con Zakopane, se pueden comprar los tickets en la taquilla o al momento de subir al bus -creo que eran 28 zl ir y venir- y salen cada 15 o 20 minutos. Es un viaje de dos o tres horas. Al llegar se puede pagar el guía -hay guías en español e inglés- o simplemente pasar y hacer el recorrido tú solo. La entrada a ambos Campos es gratis. ',
                'img_url' => 'Auschwitz.jpg',
                'city_id' => 2
            ]
        );
    }
}
