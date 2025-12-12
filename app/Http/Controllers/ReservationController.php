<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    // Show reservation form
    public function makereservation($id)
    {
        $city = City::findOrFail($id);
        return view('travelling.reservation', compact('city'));
    }

    // Handle form submission ✅
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'num_of_guest' => 'required|integer|min:1',
            'check_in_date' => 'required|date|after_or_equal:today',
            'city_id' => 'required|exists:cities,id',
        ]);


        Reservation::create([
            'user_id' => Auth::id(),
            'name' => $validated['name'],
            'phone_number' => $validated['phone_number'],
            'num_of_guest' => $validated['num_of_guest'],
            'check_in_date' => $validated['check_in_date'],
            'destination' => City::find($validated['city_id'])->name,
            'city_id' => $validated['city_id'],
        ]);

        return redirect()->route('booking.see')
            ->with('success', 'Reservation made successfully!');
    }
}
