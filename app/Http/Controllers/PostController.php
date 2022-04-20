<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Auth;

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
        $post = json_decode($data->post, true);

        if (trim($post['title']) == '') {
            abort(422);
        }

        if (Auth::check()) {
            $post['user_id'] = Auth::user()->id;
        } else {
            abort(403);
        }

        if ($data->hasFile('file')) {
            $data->validate([
                'file' => 'file|image'
            ]);
            $post['img_url'] = time() . '.' . $data->file('file')->getClientOriginalExtension();
            $data->file('file')->storeAs('/public/images/posts', $post['img_url']);
        }

        $post = Post::create([
            'title' => $post['title'],
            'text' => $post['text'],
            'img_url' => $post['img_url'],
            'city_id' => $post['city_id'],
            'user_id' => $post['user_id'],
            'post_id' => $post['post_id']
        ]);

        return response()->json(['success' => true, 'post' => $post]);
    }

    public function delete(Post $post)
    {
        $post = Post::find($post->id);
        $post->delete();
        return response()->json(['success' => true, 'post' => $post]);
    }


    public function update(Request $request, Post $post) {
        
        if($request->filled('title')) {
            $post->title = $request->title;
        }
        if($request->filled('text')) {
            $post->text = $request->text;
        }
        if($request->filled('img_url')) {
            $post->img_url = $request->img_url;
        }
        if($request->filled('city_id')) {
            $post->city_id = $request->city_id;
        }
        
        $post->save();
    }

    public function order(Request $data)
    {
        $posts = Post::all()->toArray();

        if ($data->criteria == 0) {
            usort($posts, function ($a, $b) {
                return ($a["created_at"] < $b["created_at"]) ? 1 : -1;
            });
        } elseif ($data->criteria == 1) {
            usort($posts, function ($a, $b) {
                return ($a["created_at"] < $b["created_at"]) ? -1 : 1;
            });
        } elseif ($data->criteria == 2) {
            usort($posts, function ($a, $b) {
                return ($a["likes"] < $b["likes"]) ? 1 : -1;
            });
        } elseif ($data->criteria == 3) {
            usort($posts, function ($a, $b) {
                return ($a["likes"] < $b["likes"]) ? -1 : 1;
            });
        } else {
            $posts = Post::all();
        }
        return response()->json(['success' => true, 'posts' => $posts]);
    }

    public function getComments(Post $post) {
        $comments = $post->comments()->get();
        return response()->json(['success' => true, 'comments' => $comments]);
    }
  
    public function filterByTag(Request $data) {
        $tag = Tag::findOrFail($data->tag);
        $posts = $tag->posts()->get();

        return response()->json(['success' => true, 'posts' => $posts]);
    }

    //TODO: update, not possible yet
}
