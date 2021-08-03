<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;


class OptionController extends Controller
{
    public function index()
    {
        return view('./layouts/options/add');
    }
    public function home()
    {
        $ordersCount = count(Orders::all());
        return view('home')->with('ordersCount',$ordersCount);
    }

}
