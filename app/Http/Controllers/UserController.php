<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function booking()
    {
        $bookings = Reservation::where('user_id', Auth::id())->orderBy('id','desc')->get();

        return view('users.booking', compact('bookings'));
    }
}
