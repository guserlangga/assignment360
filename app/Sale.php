<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Stock;

class Sale extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'car_name'
    ];

    protected $guarded = [
        
    ];
    
}
