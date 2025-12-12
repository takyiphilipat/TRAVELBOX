<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Auth::routes();

Route::get('/', [CountryController::class, 'latestCountries'])->name('home');
Route::get('/home', [CountryController::class, 'latestCountries']);

Route::get('/travelling/about/{id}', [CityController::class, 'about'])->name('about.go');
Route::get('/travelling/deal', [DealController::class, 'dealing'])->name('travelling.deal');
Route::any('/travelling/searchdeals',[DealController::class,'deal'])->name('travelling.searchdeals');

Route::middleware(['auth'])->group(function () {

    // show reservation form
    Route::get('/travelling/reservation/{id}', [ReservationController::class, 'makereservation'])
        ->name('reservation.go');

    // submit reservation form ✅✅✅
    Route::post('/travelling/reservation', [ReservationController::class, 'store'])
        ->name('reservation.store');

    // user bookings
    Route::get('/user/booking', [UserController::class, 'booking'])
        ->name('booking.see');
});

// ================================
// ADMIN LOGIN ROUTES (guest only)
// ================================
Route::middleware('admin.guest')->group(function () {

    Route::get('/admins/login', [AdminController::class, 'viewlogin'])
        ->name('admin.go');

    Route::post('/admins/login', [AdminController::class, 'checkLogin'])
        ->name('check.login');
});


// ================================
// ADMIN AUTH ROUTES (logged-in admins only)
// ================================
Route::middleware('admin.auth')->group(function () {

    // admin index
    Route::get('/admins/index', [AdminController::class, 'index'])
        ->name('admins.dashboard');

    // admin list
    Route::get('/admins/adminlist', [AdminController::class, 'list'])
        ->name('adminlist');

    // create admin
    Route::get('/admins/createadmin', [AdminController::class, 'creatingadmin'])
        ->name('createadmins.go');
    Route::post('/admins/createadmin', [AdminController::class, 'storeadmin'])
        ->name('createadmins.store');

    // countries
    Route::get('/admins/displaycountries', [AdminController::class, 'showcountries'])
        ->name('admincountry');
    Route::get('/admins/createcountries', [AdminController::class, 'viewcountrybeforecreate'])
        ->name('create.country');
    Route::post('/admins/createcountries', [AdminController::class, 'storecountry'])
        ->name('country.store');
    Route::delete('/admins/deletecountries/{id}', [AdminController::class, 'deletecountry'])
        ->name('delete.country');

    // city
    Route::get('/admins/displaycity', [AdminController::class, 'showcity'])
        ->name('show.city');
    Route::get('/admins/createcity', [AdminController::class, 'createcity'])
        ->name('admincity');
    Route::post('/admins/createcity', [AdminController::class, 'storecity'])
        ->name('storecity');
    Route::delete('/admins/cities/{id}', [AdminController::class, 'deleteCity'])
        ->name('city.delete');

    // bookings
    Route::get('/admins/booking', [AdminController::class, 'bookingadmin'])
        ->name('booking.admin');
});
