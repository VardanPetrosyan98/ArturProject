<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'state',
    ];
    public function orders() {

        return $this->belongsToMany(Orders::class,'orders_states');
     }
}
