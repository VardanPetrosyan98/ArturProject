<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Notifications;
use App\User;
use App\Events\FormSubmitted;
use App\Notifications\InvoicePaid;
use Illuminate\Notifications\Notifiable;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $o = Orders::all();

       
        $notifyOrder = Notifications::where('read_at',null)->orderBy('created_at', 'desc')->get();

        return view('index')->with('notifyOrder', $notifyOrder);
    }
}
