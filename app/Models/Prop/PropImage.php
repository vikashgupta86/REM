<?php

namespace App\Models\Prop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropImage extends Model
{
    use HasFactory;

 protected $table='prop_images';

    protected $fillable = [
        // Define fillable attributes here
        'property_id',
        'image',
    ];

    public $timestamps = true;
}
