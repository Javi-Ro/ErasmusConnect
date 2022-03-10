<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;

class CityController extends Controller
{
    public function getCitiesByCountry(Request $data)
    {
        $cities = City::whereCountryId($data->country_id)->get();
        return response()->json(['cities' => $cities]);
    }

    public function getAll()
    {
        $cities = City::all();
        return response()->json(['cities' => $cities]);
    }
}
