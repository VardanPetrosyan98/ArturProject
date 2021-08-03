<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutOrder extends Model
{
        protected $fillable = [
            'orders_id', 'clippings', 'clay','7d','good', 'bad'
        ];
}
