<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\User;
use App\Models\Post;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('post_user')->delete();
        $u1 = User::find(1);
        $p1 = Post::find(1);
        $u1->likes()->attach($p1->id);

        $u2 = User::find(2);
        $p2 = Post::find(1);
        $u2->likes()->attach($p2->id);

        $u3 = User::find(3);
        $p3 = Post::find(2);
        $u3->likes()->attach($p3->id);
    }
}
