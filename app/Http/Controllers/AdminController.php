<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\City;
use App\Models\Country;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use File;
class AdminController extends Controller
{
    public function viewlogin()
    {




        return view('admins.login');

    }


public function checkLogin(Request $request)
{
    // ✅ 1. Validate input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // ✅ 2. Remember me checkbox
    $remember = $request->has('remember_me');

    // ✅ 3. Attempt login using admin guard
    if (Auth::guard('admin')->attempt(
        [
            'email' => $request->email,
            'password' => $request->password,
        ],
        $remember
    )) {
        // ✅ 4. Successful login
        return redirect()->route('admins.dashboard')
            ->with('success', 'Welcome Admin!');
    }

    // ❌ 5. Failed login
    return back()->withErrors([
        'email' => 'Invalid login credentials',
    ])->withInput();
}


public function index()
{

    $countriescount = Country::select()->count();
    $citiescount = City::select()->count();
    $admincount = Admin::select()->count();

    return view('admins.index',compact('citiescount','countriescount','admincount'));
}
public function list()
{
    $adminlist = Admin::orderBy('id', 'desc')->get();

    return view('admins.adminlist', compact('adminlist'));
}
public function creatingadmin()
{

    return view('admins.createadmin');
}
public function storeadmin(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:admins,email',
        'password' => 'required|string|min:8',
    ]);

    Admin::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);

    return redirect()
        ->route('adminlist')
        ->with('success', 'Admin created successfully');
}

public function showcountries()
{

    $allcountry = Country::orderBy('id', 'desc')->get();
    return view('admins.displaycountries',compact('allcountry'));
}

public function viewcountrybeforecreate()
{

    return view('admins.createcountries');
}

public function storecountry(Request $request)
{
    // ✅ Validate inputs
    $request->validate([
        'name'        => 'required|string|max:255',
        'population'  => 'required|integer|min:1',
        'territory'   => 'required|string|max:255',
        'avg_price'   => 'required|numeric|min:0',
        'description' => 'required|string',
        'continent'   => 'required|string|max:100',
        'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // ✅ Handle image upload (your method)
    $destinationPath = 'assets/images/';
    $myimage = time().'_'.$request->image->getClientOriginalName();
    $request->image->move(public_path($destinationPath), $myimage);

    // ✅ Save to database
    Country::create([
        'name'        => $request->name,
        'population'  => $request->population,
        'territory'   => $request->territory,
        'avg_price'   => $request->avg_price,
        'description' => $request->description,
        'continent'   => $request->continent,
        'image'       => $myimage,
    ]);

    // ✅ Redirect with success message
    return redirect()
        ->route('admincountry')
        ->with('success', 'Country created successfully');
}

public function deletecountry($id)
{
    $country = Country::findOrFail($id);

    // delete image
    $imagePath = public_path('assets/images/'.$country->image);
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    // delete record
    $country->delete();

    return redirect()
        ->route('admincountry')
        ->with('delete', 'Country deleted successfully');
}

public function showcity()
{

    $allcity = City::orderBy('id', 'desc')->get();
    return view('admins.displaycity',compact('allcity'));
}

public function createcity()
{
    $countries =Country::all();

    return view('admins.createcity',compact('countries'));
}

public function storecity(Request $request)
{
    // ✅ VALIDATION
    $validated = $request->validate([
        'country_id' => 'required|exists:countries,id',
        'name'       => 'required|string|max:255',
        'image'      => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        'num_days'   => 'required|integer|min:1',
        'price'      => 'required|numeric|min:0',
    ]);

    // ✅ IMAGE UPLOAD
    $destinationPath = 'assets/images/';
    $imageName = time() . '_' . $request->image->getClientOriginalName();
    $request->image->move(public_path($destinationPath), $imageName);

    // ✅ CREATE CITY
    City::create([
        'country_id' => $validated['country_id'],
        'name'       => $validated['name'],
        'image'      => $imageName,
        'num_days'   => $validated['num_days'],
        'price'      => $validated['price'],
    ]);

    // ✅ REDIRECT WITH SUCCESS
    return redirect()
        ->route('show.city')
        ->with('success', 'City created successfully');
}
public function deleteCity($id)
{
    $city = City::findOrFail($id);

    // ✅ delete image from public folder
    if ($city->image && file_exists(public_path('assets/images/' . $city->image))) {
        unlink(public_path('assets/images/' . $city->image));
    }

    // ✅ delete city record
    $city->delete();

    return redirect()
        ->back()
        ->with('success', 'City deleted successfully');
}

public function bookingadmin()
    {

        $reserve=Reservation::orderBy('id', 'desc')->get();


        return view('admins.booking',compact('reserve'));

    }




}
