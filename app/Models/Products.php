<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'orders_id','type','weight',
    ];
     public function orders() {
     
        return $this->belongsTo(Orders::class,'orders_id','id');
            
     }
}

