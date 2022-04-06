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

    public function getPostsTags() {
        $tags = Tag::wherePost(1)->get();

        foreach ($tags as $tag) {
            $tag->name = ucfirst($tag->name); // First letter capital
        }

        return response()->json(['success' => true, 'tags' => $tags]);
    }

    public function getApartmentsTags() {
        $tags = Tag::wherePost(0)->get();

        foreach ($tags as $tag) {
            $tag->name = ucfirst($tag->name); // First letter capital
        }

        return response()->json(['success' => true, 'tags' => $tags]);        
    }

    public function update(Request $request, Tag $tag) {
        $newTag = Tag::find($tag->id);
        $newTag->name = $request->name;
        $newTag->post = $request->post;
        $newTag->save();
    }
}
