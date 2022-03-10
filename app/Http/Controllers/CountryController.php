<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function getCountries() {
        $countries = Country::all();

        return response()->json($countries);
    }
}
