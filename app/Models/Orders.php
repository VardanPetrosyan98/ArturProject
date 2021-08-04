<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Orders extends Model
{
    use Notifiable;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'endTime', 'type', 'density','sizeA', 'sizeB','weight', 'amount',
    ];
    public function about() {
     
        return $this->belongsTo(AboutOrder::class,'id','orders_id');
            
     }
     public function products() {
        return $this->hasMany(Products::class,'orders_id','id');
            
     }
}
