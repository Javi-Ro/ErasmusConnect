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

    public function getPosts()
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

    public function order(Request $data) {
        if ($data->criteria == 0) {
            $posts = Post::orderBy('created_at', 'DESC')->get();
        } elseif ($data->criteria == 1) {
            $posts = Post::orderBy('created_at', 'ASC')->get();
        } else {
            $posts = Post::all();
        }
        return response()->json(['success' => true, 'posts' => $posts]);
    }

    //TODO: update, not possible yet

}
