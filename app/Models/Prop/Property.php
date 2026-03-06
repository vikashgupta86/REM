<?php

namespace App\Models\Prop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

 protected $table='properties';

    protected $fillable = [
        'title',
        'description',
        'price',
        'image',
        'location',
        'beds',
        'baths',
        'sq/ft',
        'home_type',
        'year_built',
        'price/sqft',
        'more_info',
        'agent_name',
        'city_type',
        'offer_type',
    ];

    public $timestamps = true;
}
