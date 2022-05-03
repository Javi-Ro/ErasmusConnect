<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;
use Auth;
use Illuminate\Support\Facades\DB;
use Whoops\Run;


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
        $filename = time() . '.' . $data->file('file')->getClientOriginalExtension();
        $data->file('file')->storeAs('/public/images/apartments', $filename);
        $data = json_decode($data['apartment']);

        $apartment = Apartment::create([
            'title' => $data->title,
            'description' => $data->description,
            'price' => $data->price,
            'address' => $data->address,
            'bedrooms' => $data->bedrooms,
            'phone' => $data->phone,
            'email' => $data->email,
            'img_url' => $filename,
            'surface' => $data->surface,
            'user_id' => Auth::user()->id,
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

    public function applyFilters(Request $data) {
        if ($data->order == -1){
            $apartments = DB::table('apartments')
                                            ->when($data->minPrice, function ($query, $minPrice) {
                                              $query->where('price', '>', (int)$minPrice);
                                            })->when($data->maxPrice, function ($query, $maxPrice) {
                                                $query->where('price', '<', (int)$maxPrice);
                                            })->when($data->habitaciones, function ($query, $habitaciones) {
                                                $query->where('bedrooms', '>=', (int)$habitaciones);
                                            })->when($data->metros, function ($query, $metros) {
                                                $query->where('surface', '>=', (int)$metros);
                                            })->when($data->rate, function ($query, $rate) {
                                                $query->where('rating', '>=', (int)$rate);
                                            })
                                            ->get();
        }
        if ($data->order == 0){
            $apartments = DB::table('apartments')->orderBy('price', 'DESC')
                                            ->when($data->minPrice, function ($query, $minPrice) {
                                              $query->where('price', '>', (int)$minPrice);
                                            })->when($data->maxPrice, function ($query, $maxPrice) {
                                                $query->where('price', '<', (int)$maxPrice);
                                            })->when($data->habitaciones, function ($query, $habitaciones) {
                                                $query->where('bedrooms', '>=', (int)$habitaciones);
                                            })->when($data->metros, function ($query, $metros) {
                                                $query->where('surface', '>=', (int)$metros);
                                            })->when($data->rate, function ($query, $rate) {
                                                $query->where('rating', '>=', (int)$rate);
                                            })
                                            ->get();
        }
        if ($data->order == 1){
            $apartments = DB::table('apartments')->orderBy('price', 'ASC')
                                            ->when($data->minPrice, function ($query, $minPrice) {
                                              $query->where('price', '>', (int)$minPrice);
                                            })->when($data->maxPrice, function ($query, $maxPrice) {
                                                $query->where('price', '<', (int)$maxPrice);
                                            })->when($data->habitaciones, function ($query, $habitaciones) {
                                                $query->where('bedrooms', '>=', (int)$habitaciones);
                                            })->when($data->metros, function ($query, $metros) {
                                                $query->where('surface', '>=', (int)$metros);
                                            })->when($data->rate, function ($query, $rate) {
                                                $query->where('rating', '>=', (int)$rate);
                                            })
                                            ->get();
        }
        if ($data->order == 2){
            $apartments = DB::table('apartments')->orderBy('rating', 'DESC')
                                            ->when($data->minPrice, function ($query, $minPrice) {
                                              $query->where('price', '>', (int)$minPrice);
                                            })->when($data->maxPrice, function ($query, $maxPrice) {
                                                $query->where('price', '<', (int)$maxPrice);
                                            })->when($data->habitaciones, function ($query, $habitaciones) {
                                                $query->where('bedrooms', '>=', (int)$habitaciones);
                                            })->when($data->metros, function ($query, $metros) {
                                                $query->where('surface', '>=', (int)$metros);
                                            })->when($data->rate, function ($query, $rate) {
                                                $query->where('rating', '>=', (int)$rate);
                                            })
                                            ->get();
        }
        if ($data->order == 3){
            $apartments = DB::table('apartments')->orderBy('rating', 'ASC')
                                            ->when($data->minPrice, function ($query, $minPrice) {
                                              $query->where('price', '>', (int)$minPrice);
                                            })->when($data->maxPrice, function ($query, $maxPrice) {
                                                $query->where('price', '<', (int)$maxPrice);
                                            })->when($data->habitaciones, function ($query, $habitaciones) {
                                                $query->where('bedrooms', '>=', (int)$habitaciones);
                                            })->when($data->metros, function ($query, $metros) {
                                                $query->where('surface', '>=', (int)$metros);
                                            })->when($data->rate, function ($query, $rate) {
                                                $query->where('rating', '>=', (int)$rate);
                                            })
                                            ->get();
        }
        if ($data->order == 4){
            $apartments = DB::table('apartments')->orderBy('surface', 'DESC')
                                            ->when($data->minPrice, function ($query, $minPrice) {
                                              $query->where('price', '>', (int)$minPrice);
                                            })->when($data->maxPrice, function ($query, $maxPrice) {
                                                $query->where('price', '<', (int)$maxPrice);
                                            })->when($data->habitaciones, function ($query, $habitaciones) {
                                                $query->where('bedrooms', '>=', (int)$habitaciones);
                                            })->when($data->metros, function ($query, $metros) {
                                                $query->where('surface', '>=', (int)$metros);
                                            })->when($data->rate, function ($query, $rate) {
                                                $query->where('rating', '>=', (int)$rate);
                                            })
                                            ->get();
        }
        if ($data->order == 5){
            $apartments = DB::table('apartments')->orderBy('surface', 'ASC')
                                            ->when($data->minPrice, function ($query, $minPrice) {
                                              $query->where('price', '>', (int)$minPrice);
                                            })->when($data->maxPrice, function ($query, $maxPrice) {
                                                $query->where('price', '<', (int)$maxPrice);
                                            })->when($data->habitaciones, function ($query, $habitaciones) {
                                                $query->where('bedrooms', '>=', (int)$habitaciones);
                                            })->when($data->metros, function ($query, $metros) {
                                                $query->where('surface', '>=', (int)$metros);
                                            })->when($data->rate, function ($query, $rate) {
                                                $query->where('rating', '>=', (int)$rate);
                                            })
                                            ->get();
        }

        //$apartments = DB::table('apartments')->where('price', '>', (int)$data->minPrice)->get();       
        
        return response()->json(['success' => true, 'apartments' => $apartments]);
    }
}
