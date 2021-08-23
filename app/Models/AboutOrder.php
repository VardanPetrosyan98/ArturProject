<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutOrder extends Model
{
        protected $fillable = [
            'orders_id', 'clippings', 'clay','7d','good', 'bad'
        ];
        public function orders() {
     
            return $this->belongsTo(Orders::class,'orders_id','id');
                
         }
}
