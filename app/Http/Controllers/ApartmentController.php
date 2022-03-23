<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;

class ApartmentController extends Controller
{
    public function get(Apartment $apartment){
        return response()->json(['apartment' => $apartment]);
    }

    public function getApartments()
    {
        $apartments = Apartment::all();
        return response()->json(['apartments' => $apartments]);
    }

    public function create(Request $data)
    {
        $apartment = Apartment::create([
            'title' => $data->title,
            'description' => $data->description,
            'price' => $data->price,
            'address' => $data->address,
            'bedrooms' => $data->bedrooms,
            'phone' => $data->phone,
            'email' => $data->email,
            'img_url' => $data->img_url,
            'surface' => $data->surface,
            'user_id' => $data->user_id,
            'city_id' => $data->city_id
        ]);

        return response()->json(['success' => true, 'apartment' => $apartment]);
    }

    public function delete(Apartment $apartment)
    {

        if (Apartment::whereId($apartment->id)->count()) {
            $apartment->delete();
            return response()->json(['success' => true, 'apartment' => $apartment]);
        }

        return response()->json(['success' => false]);
    }
}
