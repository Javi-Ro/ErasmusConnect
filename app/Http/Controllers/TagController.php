<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{

    public function get(Tag $tag)
    {
        return response()->json(['tag' => $tag]);
    }

    public function getTags()
    {
        $tags = Tag::all();
        return response()->json(['tag' => $tags]);
    }

    public function create(Request $data)
    {
        $tag = Tag::create([
            'name' => $data->name,
            'post' => $data->post
        ]);

        return response()->json(['success' => true, 'tag' => $tag]);
    }

    public function delete(Tag $tag)
    {
        if (Tag::whereId($tag->id)->count()) {
            $tag->delete();
            return response()->json(['success' => true, 'tag' => $tag]);
        }
        return response()->json(['success' => false]);
    }

    /*

    public function delete(User $user)
    {

        if (User::whereId($user->id)->count()) {
            $user->delete();
            return response()->json(['success' => true, 'user' => $user]);
        }

        return response()->json(['success' => false]);
    }
    */
}
