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

    public function update(Request $request, Post $post) {
        $newPost = Post::find($post->id);
        $newPost->title = $request->title;
        $newPost->text = $request->text;
        $newPost->img_url = $request->img_url;
        $newPost->city_id = $request->city_id;
        $newPost->update();
    }

    public function order(Request $data) {
        $posts = Post::all();

        if ($data->criteria == 0) {
            $posts = $posts->sortByDesc(function($post) {
                return $post->created_at->get();
            });
            //$posts = Post::orderBy('created_at', 'DESC')->get();
        } elseif ($data->criteria == 1) {
            $posts = $posts->sortBy(function($post) {
                return $post->created_at->get();
            });
            //$posts = Post::orderBy('created_at', 'ASC')->get();
        } 
        elseif ($data->criteria == 2) {
            $posts = $posts->sortBy(function($post) {
                return $post->likes;
            });
            //$posts = Post::orderBy('likes', 'ASC')->get();
        }
        elseif ($data->criteria == 3) {
            $posts = $posts->sortByDesc(function($post) {
                return $post->likes;
            });
            //$posts = Post::orderBy('likes', 'DESC')->get();
        }
        else {
            $posts = Post::all();
        }
        return response()->json(['success' => true, 'posts' => $posts]);
    }

    //TODO: update, not possible yet

}
