<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

    // Route::get('/', function () {
    //     $user = App\User::find(1);
    //     // dd($user->hasRole('worker')); //вернёт true
    //     // dd($user->hasRole('admin')); //вернёт false
    //     // Gate::allows('manage-users') //выдаём разрешение
    //     // dd($user->hasPermission('manage-users')); //вернёт true
    //         return view('index');
    //     });
    Route::get('/', 'HomeController@index')->name('index');



// notify
Route::group(['prefix' => 'notify'], function() {
    Route::post('/NotifMarkAsRead', 'NotificationController@NotifMarkAsRead')->name('notif.mark.as.read');

});
// options 
Route::group(['prefix' => 'options'], function() {
    Route::get('/home', 'OptionController@home')->name('home');
    Route::get('/add', 'OptionController@index')->name('add');
});
// systems
Route::group(['prefix' => 'system'], function() {

    Route::group(['prefix' => 'orders'], function() {
        Route::get('/', 'SystemController@orders')->name('system.orders');
        Route::get('/orderNum', 'SystemController@ordersSerach')->name('system.orders.search');
        Route::get('/filter', 'SystemController@ordersFilter')->name('system.orders.filter');
        Route::get('/getaboutorderform', 'SystemController@getAboutOrderForm')->name('system.about.orders.form');
        Route::group(['prefix' => 'add'], function() {
            Route::post('/', 'SystemController@addOrders')->name('system.orders.add');
            Route::post('/about', 'SystemController@ordersAbout')->name('system.about.orders.add');
        });
        Route::group(['prefix' => 'products'], function() {
            Route::post('/add', 'SystemController@addProduct')->name('system.orders.product.add');
            Route::post('/about', 'SystemController@aboutProduct')->name('system.orders.product.about');
            Route::post('/remove', 'SystemController@removeProduct')->name('system.orders.product.remove');
            
        });

        Route::group(['prefix' => 'remove'], function() {
            Route::post('/', 'SystemController@removeOrders')->name('system.orders.remove');
            Route::post('/about', 'SystemController@orderAboutRemove')->name('system.about.orders.remove');
        
        });
    });
    Route::get('/sintepon', 'SystemController@index')->name('system.sintepon');
});


