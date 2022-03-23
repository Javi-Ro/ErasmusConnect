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

        if (Country::whereId($country->id)->count()) {
            $country->delete();
            return response()->json(['success' => true, 'country' => $country]);
        }

        return response()->json(['success' => false]);
    }

    //public functio update() {}
}
