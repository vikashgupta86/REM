<?php

namespace App\Models\Prop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveProps extends Model
{
    use HasFactory;
     protected $table='save_props';

    protected $fillable = [
        // Define fillable attributes here
        'property_id',
        'user_id',
        'title',
        'image',
        'location',
        'price',

    ];

    public $timestamps = true;
}
