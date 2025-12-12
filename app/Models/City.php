<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    // Table name (optional if your table is "cities")
    protected $table = 'cities';

    // Fields that can be mass-assigned
    protected $fillable = [
        'name',
        'image',
        'num_days',
        'price',
        'description',
        'country_id',
    ];

    // Enable timestamps (this is already default)
    public $timestamps = true;
}
