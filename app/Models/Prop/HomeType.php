<?php

namespace App\Models\Prop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeType extends Model
{
    use HasFactory;
    protected $table='home_types';

    protected $fillable = [
        // Define fillable attributes here
   'id',
   'home_type',
    ];

    public $timestamps = true;
}

 
