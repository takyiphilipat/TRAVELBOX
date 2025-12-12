<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;

class DealController extends Controller
{
    public function dealing()
    {
        $countries = Country::all();
        $cities = City::orderBy('id', 'desc')->take(4)->get();

        return view('travelling.deal', compact('cities', 'countries'));
    }

    public function deal(Request $request)
{
    $countries = Country::all();
    $query = City::query();

    // ✅ Filter by country
    if ($request->country_id) {
        $query->where('country_id', $request->country_id);
    }

    // ✅ Filter by price
    if ($request->price) {
        $query->where('price', '<=', $request->price);
    }

    // ✅ Get final results
    $cities = $query->orderBy('id', 'desc')->get();

    return view('travelling.searchdeals', compact('cities', 'countries'));
}

}
