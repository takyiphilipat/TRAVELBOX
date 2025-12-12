<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\City;

class CityController extends Controller
{
    public function about($id)
    {
        // Get selected country
        $country = Country::findOrFail($id);

        // Get all cities in this country
        $cities = City::where('country_id', $id)->get();

        return view('travelling.about', compact('country', 'cities'));
    }
}
