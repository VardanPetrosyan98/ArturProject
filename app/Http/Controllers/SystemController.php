<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\AboutOrder;
use App\Models\Products;
use App\Models\State;
use App\Models\OrdersState;
use App\User;
use Illuminate\Notifications\Notifiable;
use App\Events\FormSubmitted;
use App\Notifications\InvoicePaid;
use Carbon\Carbon;
use App\Models\Notifications;

class SystemController extends Controller
{
    use Notifiable;
    
    public function index(Request $request)
    {
        return view('./layouts/systems/sintepon');
    }
    public function orders(Request $request)
    {
        $orders = Orders::orderBy('created_at', 'desc')->get();
        if(isset($request->id)){
            $orders = Orders::where('id',$request->id)->get();
        };


        // $orders = json_encode($ordersArr);

        // $ordersArr = [
        //     [
        //         'num' => ' 2',
        //         'content' => [
        //             'typeId' => 1,
        //             'type' => 'чистый',
        //             'endTime' => '13.12.2021',
        //             'density' => '100',
        //             'size' =>   [
        //                 0 => '1.5',
        //                 1 => '30'
        //             ],
        //             'weight'=> '12',
        //             'amount' => '10',
        //         ],
        //         'createTime' => ' 12.12.2021 17:30'
        //     ],
        //     [
        //         'num' => ' 1',
        //         'content' => [
        //             'typeId' => 1,
        //             'type' => 'чистый',
        //             'endTime' => '15.12.2021',
        //             'density' => '200',
        //             'size' =>   [
        //                 0 => '2.2',
        //                 1 => '50'
        //             ],
        //             'weight'=> '12',
        //             'amount' => '90',
        //         ],
        //         'createTime' => '12.12.2021 17:30'
        //     ],
           
            
        // ];
        
        
        return view('./layouts/systems/order')->with('orders', $orders);;
    }
    public function addOrders(Request $request)
    {
        $order = Orders::create(array(
            'endTime' => $request->date,
            'type' => $request->type,
            'density'    => $request->density,
            'sizeA' => $request->sizeA,
            'sizeB' => $request->sizeB,
            'weight' => $request->weight,
            'amount'    => $request->amount,
        ));
        $state = State::find(1);
        $order->states()->attach($state);
        // $when = Carbon::now()->addSeconds(10);
        $notify = $order;
        Orders::find($order->id) -> notify(new InvoicePaid($notify));
        
    }
    
    public function removeOrders(Request $request)
    {
        $orders =  Orders::find($request->orderId);
        if(is_null($orders)){
            return response()->JSON(false);
        }
        $orders->delete();
        return response()->JSON(true);
    }
    // [['email','=',$email],['password','=', $password]]
    public function ordersFilter(Request $request)
    {
        $orders =  Orders:: where('type', 'like', '%'.$request->type.'%')
        ->where('density', 'like', '%'.$request->density.'%')
        ->where('sizeA', 'like', '%'.$request->sizeA.'%')
        ->where('sizeB', 'like', '%'.$request->sizeB.'%')
        ->where('weight', 'like', '%'.$request->weight.'%')
        ->where('amount', 'like', '%'.$request->amount.'%')
        ->orderBy('created_at', 'desc')->get();
      return view('./layouts/systems/order')->with('orders', $orders);

    }
    public function ordersSerach(Request $request){
        return view('./layouts/systems/order');
    }
    public function getAboutOrderForm(Request $request){
        $orderId = $request->id;
        $order = Orders::find($orderId);
        return view('./layouts/systems/aboutOrderForm')->with('order',$order);
        
    }

    public function ordersAbout(Request $request)
    {
        
        if(!$request-> clippings && !$request-> clay &&!$request-> _7d && $request-> good && $request-> bad) return false;
        $aboutOrder = new AboutOrder;

        $aboutOrder->orders_id = $request->orderId;

        if($request-> clippings){
            $aboutOrder->clippings = $request-> clippings;
        }
        if($request-> clay){
            $aboutOrder->clay = $request-> clay;
        }
        if($request->_7d){
            $aboutOrder->_7d = $request->_7d;
        }
        if($request->good){
            $aboutOrder->good = $request->good;
        }
        if($request->bad){
            $aboutOrder->bad = $request->bad;
        }

        $aboutOrder->save();
        $order = $aboutOrder->orders;
        $state = State::all();
        if(count($state[1]->orders) != 0 ) $state[1]->orders[0]->states()->sync($state[2]);
        $order->states()->sync($state[1]);
        $orders = Orders::orderBy('created_at', 'desc')->get();

      return view('./layouts/systems/order')->with('orders', $orders);

    }
    public function orderAboutRemove(Request $request)
    {
        $aboutOrder = AboutOrder::find($request->aboutId);
        $aboutOrder->delete();
        return response()->JSON(true);  
    }
    public function addProduct(Request $request)
    {
        if($request->add == 'true')
        {
            
            $product = new Products;
            $product->orders_id = $request->orderId;
            $product->type = $request->radio;
            if(!is_null($request->weight)){
                $product->weight = $request->weight;
            }
            $product->save();
            $_var = 1;
            event(new FormSubmitted($_var));
            $orders = $product->orders->get();
            return view('./layouts/systems/order')->with('orders', $orders);

            return response()->JSON(true);
            // 'orderId'=>$request->orderId,
        }
        return view('./layouts/systems/addProductForm')->with('orderId',$request->orderId);
    }
    public function aboutProduct(Request $request)
    {
        $product = Products::find($request->productId);
        return view('./layouts/systems/doneProductAboutForm')->with('product',$product);
    }
    public function removeProduct(Request $request){
        $product = Products::find($request->productId);
        // $product -> delete();
        return response()->JSON(true);
    }

}

    