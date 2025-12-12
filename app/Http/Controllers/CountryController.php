<?php

namespace App\Http\Controllers;

use App\Models\Country;   // <-- YOU MUST ADD THIS
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function latestCountries()
    {
        $countries = Country::orderBy('created_at', 'desc')->get();

        return view('home', compact('countries'));
    }
}
