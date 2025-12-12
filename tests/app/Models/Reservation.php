<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';

    protected $fillable = [
        'user_id',
        'name',
        'phone_number',
        'num_of_guest',
        'check_in_date',
        'destination',
        'city_id',
         'price',
         'status',

    ];

    public $timestamps = true;
}
