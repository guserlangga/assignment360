<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sale;

class Stock extends Model
{
    protected $fillable = [
        'name', 'price', 'stock'
    ];
    
    protected $guarded = [
        
    ];
}
