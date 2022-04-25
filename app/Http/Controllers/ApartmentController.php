<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;

class ApartmentController extends Controller
{
    public function get(Apartment $apartment)
    {
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

    public function update(Request $request, Apartment $apartment) {
         
        if($request->filled('title')) {
            $apartment->title = $request->title;
        }
        if($request->filled('description')) {
            $apartment->description = $request->description;
        }
        if($request->filled('img_url')) {
            $apartment->img_url = $request->img_url;
        }
        if($request->filled('price')) {
            $apartment->price = $request->price;
        }
        if($request->filled('email')) {
            $apartment->email = $request->email;
        }
        if($request->filled('phone')) {
            $apartment->phone = $request->phone;
        }
        
        $apartment->save();
    }

    public function order(Request $data)
    {
        //Ordenar por precio
        if ($data->criteria == 0) {
            $apartments = Apartment::orderBy('price', 'DESC')->get();
        } elseif ($data->criteria == 1) {
            $apartments = Apartment::orderBy('price', 'ASC')->get();
        } elseif ($data->criteria == 2) {
            $apartments = Apartment::orderBy('rating', 'DESC')->get();
        } elseif ($data->criteria == 3) {
            $apartments = Apartment::orderBy('rating', 'ASC')->get();
        } elseif ($data->criteria == 4) {
            $apartments = Apartment::orderBy('surface', 'DESC')->get();
        } elseif ($data->criteria == 5) {
            $apartments = Apartment::orderBy('surface', 'ASC')->get();
        } else {
            $apartments = Apartment::all();
        }

        return response()->json(['success' => true, 'apartments' => $apartments]);
    }

    public function applyFilters(Object $filters) {
        return Apartment::when($filters->minPrice != "", function ($query, $minPrice) {
                                              $query->where('price', '>', $minPrice);
                                        })
                                        ->get();
    }
}
