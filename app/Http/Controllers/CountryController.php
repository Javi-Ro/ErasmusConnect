<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function get(Country $country) {
        return response()->json(['country' => $country]);
    }

    public function getCountries() {
        $countries = Country::all();

        return response()->json(['countries' => $countries]);
    }

    public function create(Request $data) {
        $country = Country::create([
            'name' => $data->name
        ]);

        return response()->json(['success' => true, 'country' => $country]);
    }

    public function delete(Country $country) {

        $country = Country::find($country->id);
        $country->delete();
        return response()->json(['success' => true, 'country' => $country]);
    }

    public function update(Request $request, Country $country) {
        
        if($request->filled('name')) {
            $country->name = $request->name;
        }
        
        $country->save();
    }
}
