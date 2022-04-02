<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

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
        $posts = Post::all()->toArray();

        if ($data->criteria == 0) {
            usort($posts, function($a, $b) {return ($a["created_at"] < $b["created_at"]) ? 1 : -1;});
        } elseif ($data->criteria == 1) {
            usort($posts, function($a, $b) {return ($a["created_at"] < $b["created_at"]) ? -1 : 1;});
        } elseif ($data->criteria == 2) {
            usort($posts, function($a, $b) {return ($a["likes"] < $b["likes"]) ? 1 : -1;});
        } elseif ($data->criteria == 3) {
            usort($posts, function($a, $b) {return ($a["likes"] < $b["likes"]) ? -1 : 1;});
        } else {
            $posts = Post::all();
        }
        return response()->json(['success' => true, 'posts' => $posts]);
    }

    public function filterByTag(Request $data) {
        $tag = Tag::findOrFail($data->tag);
        $posts = $tag->posts()->get();

        return response()->json(['success' => true, 'posts' => $posts]);
    }

    //TODO: update, not possible yet

}
