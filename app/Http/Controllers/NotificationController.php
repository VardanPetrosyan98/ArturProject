<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifications;
use App\Notifications\InvoicePaid;
use Carbon\Carbon;


class NotificationController extends Controller
{
    public function NotifMarkAsRead(Request $request){
        $mytime = Carbon::now();
        $mytime->toDateTimeString();
        $notification = Notifications::where('notifiable_id',$request->notif_id)->first();
        $notification->read_at = $mytime;
        $notification->save();
        return response()->JSON(true);
    }
}
