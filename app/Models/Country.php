<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries'; // or 'country' if your table name is country

    protected $fillable = [
        'name',
        'territory',
        'population',
        'avg_price',
        'description',
        'continent',
        'image',
    ];

    public $timestamps = true;





}
