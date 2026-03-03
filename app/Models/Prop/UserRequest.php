<?php

namespace App\Models\Prop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRequest extends Model
{
    use HasFactory;

 protected $table='requests';

    protected $fillable = [
        // Define fillable attributes here
        'property_id',
         'agent_name',
        'user_id',
        'name',
        'email',
        'phone',

       

         
    ];

    public $timestamps = true;
}
