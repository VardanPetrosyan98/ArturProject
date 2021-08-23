<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\State;



class OptionController extends Controller
{
    public function index()
    {
        return view('./layouts/options/add');
    }
    public function home()
    {
        // $ordersCount = count(Orders::all());
        $ordersCount = count(State::where('state','New')->first()->orders);
        return view('home')->with('ordersCount',$ordersCount);
    }

}
