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
    }
}
