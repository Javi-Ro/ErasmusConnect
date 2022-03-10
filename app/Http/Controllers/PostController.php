<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function get(Post $post)
    {
        return response()->json(['post' => $post]);
    }

    public function getAll()
    {
        $posts = Post::all();
        return response()->json(['posts' => $posts]);
    }

    public function create(Request $data)
    {
        $post = Post::create([
            'title' => $data->title,
            'user_id' => $data->user_id
        ]);

        return response()->json(['success' => true, 'post' => $post]);
    }

    public function delete(Post $post)
    {

        if (Post::whereId($post->id)->count()) {
            $post->delete();
            return response()->json(['success' => true, 'post' => $post]);
        }

        return response()->json(['success' => false]);
    }

    //TODO: update, not possible yet

}
