<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;

class CityController extends Controller
{
    public function getCityById(Request $data) {
        $city = City::whereId($data->id)->first();
        return response()->json(['city' => $city]);
    }

    public function getCitiesByCountry(Request $data)
    {
        $cities = City::whereCountryId($data->country_id)->get();
        return response()->json(['cities' => $cities]);
    }

    public function get(City $city) {
        return response()->json(['city' => $city]);
    }

    public function getCities()
    {
        $cities = City::all();
        return response()->json(['cities' => $cities]);
    }

    public function create(Request $data)
    {
        $city = City::create([
            'name' => $data->name,
            'country_id' => $data->country_id
        ]);

        return response()->json(['success' => true, 'city' => $city]);
    }

    public function delete(City $city)
    {

        $city = City::find($city->id);
        $city->delete();
        return response()->json(['success' => true, 'city' => $city]);

    }

    public function update(string $city1, string $city2) {    
        $newCity = City::whereName($city1)->first();
        $newCity->name = $city2;
        $newCity->save();
    }

}
