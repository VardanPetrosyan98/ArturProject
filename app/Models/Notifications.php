<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{   
    
    protected $fillable = [
        'notifiable_id',  'data','read_at','created_at'
    ];
}

// Чтобы получить такое уведомление, просто используйте отношение notifications.

// $user = auth()->user();
// foreach ($user->unreadNotifications as $notification) {
//     echo $notification->type;
// }
// Для получения всех непрочитанных уведомлений:

// foreach ($user->unreadNotifications as $notification) {
//     //
// }
// Отметить уведомления как прочитанные:

// foreach ($user->unreadNotifications as $notification) {
//     $notification->markAsRead();
// }
// Чтобы пометить все уведомления как прочитанные, используйте метод markAsRead() непосредственно в коллекции уведомлений.

// $user->unreadNotifications->markAsRead();
// Чтобы удалить все уведомления для конкретной модели User:

// $user->notifications()->delete();