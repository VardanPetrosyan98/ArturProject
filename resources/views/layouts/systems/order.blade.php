<div id="content">

    <style>
        .order-settings-box{
            position: sticky;
            bottom: 0;
            text-align: center;
        }
        button.btn.order-settings-btn {
            width: 40px;
            height: 40px;
            background-color: white;
            border-radius: 50%;
            box-shadow: 0px 0px 9px 3px black;
            margin-left: 10px;
        }
        button.btn.order-settings-btn:hover{
            background-color: silver
        }
        input{
            border: 0!important;
            border-bottom: 1px solid !important;
            width: 40px;
            border-radius: 4px;
            margin: 0 5px;
            text-align: center;
        }
        input[type="date"]{
            width: 150px;
            display: inline-block;
            border: 0;

        }
        input[type="number"]{
            width: 40px;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
        }
        #successOrder{
            position: absolute;
            right: 10px;
            top: 25px;
            color: green;
            box-shadow: 0px 0px 9px 3px black;
            transition: .3s
        }
        .deleteOrder{
            position: absolute;
            right: 10px;
            top: 25px;
            /* background-color: #3d403d; */
            color: red;
            box-shadow: 0px 0px 9px 3px black;
            transition: .3s
        }
        #successOrder:active{
            color: white
        }
        .deleteOrder:active{
            color: white
        }
        .add-order-box{
            position: absolute;
            left: -1000px;
            transition: 1s;
            opacity: 0;
        }
        .add-order-box.active{
            left:0;
            opacity: 1;
        }
        .add-order-box{
            position: absolute ;
            opacity: 0;
            left: -1000px;
        }
        .add-order-box.active{
            opacity: 1;
            left: 0;
            transition: 1s;
        }
        hr{
            transition: 1s;
            position: relative;
        }
        .deleteOrder{
            display: none;
            /* opacity: 0; */
            /* transition: cubic-bezier(0.075, 0.82, 0.165, 1) .7s; */
        }
        .deleteOrder.active{
            /* display: unset; */
            /* opacity: 1; */
        }
        .news-time{
            text-decoration: underline;
        }
        .info-order-title{
            font-weight: 800;
        }
        .info-order{
            font-weight: 600;
        }
        .num-order{

        }
        .createdAt-order{
            font-size: 12px;
        }
        input.error{
            border: 2px solid red !important;
        }
        .order-footer{
            display: flex;
            justify-content: space-between;
            padding: 5px;
        }
        .about-order,.products{
            height: 0px;
            transition: 1s;
            overflow: hidden;
            text-align: center;
            transform: rotate(0deg);

        }
       
        .about-order.active,.products.active{
            height:max-content;
        }
        .start-work{
            border-radius: 50%;
            width: 50px;
            height: 50px;
        }
        #about-form-box{
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        align-items: center;
        justify-content: center;
        background-color: #0000;
        transition: .8s;
        }
        .empty-order{
            background-color: white;
            padding: 1px 10px;
            border-radius: 15px;
            text-align: center;
        }
        .product-ul{
            position: relative;
            list-style: none;
            display: flex;
            background-color: #c0c0c099;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0px 0px 11px 0px black;
            width: 95%;
            margin: 15px auto;
            flex-wrap: wrap;
        }
        .product-li{
            margin-right: 10px;
            margin-bottom: 10px;
        }
        .product-box{
            width: 25px;
            height: 25px;
            border-radius: 7px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 18px;
            font-family: ui-serif;
            font-weight: 500;
            box-shadow: 0px 0px 10px 0px #000000ed;
            border: 1px solid #025602;
            transition: .3s;
            cursor: pointer;
            text-transform: uppercase;
        }
        .product-box:active {
            box-shadow: inset 0px 0px 10px 0px #000000ed;
        }
        @-webkit-keyframes spin {  
        0% {  
            -webkit-transform: rotate(0deg);  
            width:25px;
            height:25px;
        }  
        20% {  
            -webkit-transform: rotate(-30deg);  
            width:30px;
            height:30px;
        }  
        40% {  
            -webkit-transform: rotate(30deg);  
            width:30px;
            height:30px;
        }  
        60% {  
            -webkit-transform: rotate(-20deg);  
            width:30px;
            height:30px;
        }  
        80% {  
            -webkit-transform: rotate(20deg);  
            width:30px;
            height:30px;
        }  
        100% {  
            -webkit-transform: rotate(0deg);  

            width:25px;
            height:25px;
            } 
        }

        .product-box.wheel {
           
            -webkit-animation-name: spin; 
            -webkit-animation-iteration-count: 1; 
            -webkit-animation-timing-function: linear;
            -webkit-animation-duration: .6s; 
        }
        .s-product{
            background-color: red;

        }
        .n-product{
            background-color: green;

        }
        .b-product{
            background-color: #ff8800;
        }
        .add-product{
            border-radius: 50%;
            width: 25px;
            height: 25px;
            font-size: 12px;
        }
        .add-product-box{
            position: absolute;
            right: -9px;
            top: -9px;
        }
        .product-about.active{
            box-shadow: inset 0px 0px 20px 0px black;
            background-color: #0000006e;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
            display: flex;
            justify-content: center;
            width: 100%;
            height: 100%;
        }
        .state {
            padding: 5px 10px;
            border-radius: 10px;
        }
        .state.new{
            color: blue;
            box-shadow: 0px 0px 7px 0px blue;
        }
        .state.in_progres{
            color: palevioletred;
            box-shadow: 0px 0px 7px 0px palevioletred;
        }
        .state.poused{
            color: yellow;
            box-shadow: 0px 0px 7px 0px yellow;
        }
        .state.done{
            color: green;
            box-shadow: 0px 0px 7px 0px green;
        }
        .state.canceled{
            color: red;
            box-shadow: 0px 0px 7px 0px red;
        }
        
    </style>
    <div class="list-orders">
        <hr class="mt-0">
                <div id="add-order-box" class=" px-2 py-1 order add-order-box" data-system="orders" data-id="">
                    <h5 class="m-0 p-0 news-title " >Заказ</h5>
                    <p class="m-0 p-0 news-content"> 
                        <form action="{{route('system.orders.add')}}" id="addOrderForm" method="POST">
                        @csrf
                        СРОК : (<input required id="addOrder-time" name="date" type="date" class="form-control" id="pickupdate">) 
                        <br>
                        <br>

                        {{__('Тип')}} -
                        <select  name="type" id="" class="filter-order" >
                                    <option value="чистый" id="addOrder-type-1" checked>
                                        чистый
                                    </option>
                                    <option value="нитк" id="addOrder-type-2">
                                        нитк.
                                    </option>
                                    <option value="шерсть" id="addOrder-type-3">
                                        шерсть
                                    </option>
                        </select>,
                        {{__('Плотность')}} -
                        <input required class="filter-order" class="filter-order" type="number" name="density" min="0" id="addOrder-density">  г., 
                        {{__('Размер')}} - 
                        (<input required type="number" class="filter-order" name="sizeA" min="0" id="addOrder-sizeA">  X  <input type="number" class="filter-order" name="sizeB" min="0" id="addOrder-sizeB"> м.),  
                        {{__('Вес')}} - 
                        <input required type="number" class="filter-order" name="weight" min="0" id="addOrder-weight"> кг. ,
                        {{__('Количество')}} - 
                        <input required type="text" class="filter-order" min="0" name="amount" id="addOrder-amount"> ш.
                    </p>
                    <button type="button" id="successOrder" class="btn order-settings-btn  btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                    </form> 
                </div>
            <hr>
        <div class="created-orders-box" id="created-orders-box">
            <div id="orders-list">
                @forelse($orders as $key => $value)
                    <hr class="mt-0">
                    
                <div class="created-order px-2 py-1 order " data-type-id="{{$value->id}}" data-type="{{$value->type}}" data-endTime="{{$value->endTime}}" data-density="{{$value->density}}" data-size-a="{{$value->sizeA}}" data-size-b="{{$value->sizeB}}" data-weight="{{$value->weight}}" data-amount="{{$value->amount}}" data-system="orders" data-id="{{$key+1}}">
                    <h5 class="m-0 p-0 news-title created-order d-flex justify-content-between" >
                        <span class="num-order">
                        No. {{$value -> id}} 
                        </span>
                       
                        <span class="createdAt-order">
                        {{__('создано')}}: {{$value->created_at}} 
                        </span>
                    </h5>
                    <hr>
                    <div class="content-order row m-0">
                        <div class="left-bar col-md-11">
                            <p class="m-0 p-0 news-content"> 
                            <span class="info-order-title">
                                {{__('Заказ')}}
                            </span>::
                            <span class="info-order">
                                {{__('Срок')}} 
                            </span>
                            - ( {{$value->endTime}} ), 
                            <span class="info-order">
                                {{__('Тип')}} 
                            </span>
                            - {{$value->type}},  
                            <span class="info-order">
                                {{__('Плотность')}}
                            </span>
                            - {{$value->density}} Г., 
                            <span class="info-order">
                                {{__('Размер')}} 
                            </span>
                            - ( {{$value->sizeA}} X {{$value->sizeB}} ) М., 
                            <span class="info-order">
                                {{__('Вес')}} 
                            </span>
                            - {{$value->weight}} Кг, 
                            <span class="info-order">
                                {{__('Количество')}}  
                            </span>
                            - {{$value->amount}} Ш
                                        <br>
                            <span class="info-order">
                                {{__('Кратко')}}
                            </span>
                            ::
                                ( {{$value->type}} ),
                                {{$value->density}} Г.,
                                ( {{$value->sizeA}} X {{$value->sizeB}} ) М.,
                                {{$value->weight}} Кг
                                -
                                {{$value->amount}} Ш
    
                            </p>
                        </div>
                        <div class="right-bar col-md-1">
                            @role('worker') 
                                    @switch($value->states[0]->state)
                                        @case('In Progres')
                                            <button class="start-work {{$value->states[0]->state}} btn-warning" data-order-id="{{$value->id}}">
                                                <i class="fa fa-pause" aria-hidden="true"></i>
                                            </button>
                                            @break
                                        @case('Canceled')
                                            <button class="start-work {{$value->states[0]->state}} btn-danger" data-order-id="{{$value->id}}">
                                                <i class="fa fa-remove" aria-hidden="true"></i>
                                            </button>
                                            @break
                                        @case('Done')
                                            <button class="start-work {{$value->states[0]->state}} btn-success" data-order-id="{{$value->id}}">
                                                <i class="fa fa-success" aria-hidden="true"></i>
                                            </button>
                                            @break
                                        @default
                                        <button class="start-work {{$value->states[0]->state}} btn-success" data-order-id="{{$value->id}}">
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                        </button>
                                    @endswitch
                               
                            @endrole
                        </div>
                    </div>
                    
                    <div class="order-footer">
                        <span class="m-0 p-0 news-time">{{__('СРОК ДО')}}: ({{$value->endTime}}), </span>
                        @if(!empty($value->about()->get()->toArray()))
                        <span class="state {{$value->states[0]->state}}">{{__($value->states[0]->state)}}</span >
                        <div class="about-box d-flex">
                            <a href="#" class="m-0 p-0 news-about">{{__('ОПИСАНИЕ')}}</a>
                            <div class="vertical-line" style="background-color: #00000066;
                            width: 1px;
                            margin: 0px 10px;
                            border-radius: 20px;"></div>
                            <a href="#" class="m-0 p-0 product-done">{{__('СДЕЛАНО')}}</a>
                        </div>
                        @else
                        <span class="state {{$value->states[0]->state}}">{{__($value->states[0]->state)}}</span>
                        @endif

                    </div>
                    @if(!empty($value->about()->get()->toArray()))
                    <div class="about-order">
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col" class="text-center">clippings</th>
                                    <th scope="col" class="text-center">clay</th>
                                    <th scope="col" class="text-center">_7d</th>
                                    <th scope="col" class="text-center">good</th>
                                    <th scope="col" class="text-center">bad</th>
                                    <th scope="col" class="text-center">created_at</th>
                                    @role('worker')
                                    <th scope="col" class="text-center">remove</th>
                                    @endrole
                                </tr>
                            </thead>
                            <tbody>
                        @forelse($value->about()->get() as $key=>$about_order)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>
                                        @if(is_null($about_order->clippings))
                                        -
                                        @endif
                                        {{$about_order->clippings}}
                                        Кг.
                                    </td>
                                    <td>
                                        @if(is_null($about_order->clay))
                                        -
                                        @endif
                                        {{$about_order->clay}}
                                        Кг.
                                    </td>
                                    <td>
                                        @if(is_null($about_order->_7d))
                                        -
                                        @endif
                                        {{$about_order->_7d}}
                                        Кг.
                                    </td>
                                    <td>
                                        @if(is_null($about_order->good))
                                        -
                                        @endif
                                        {{$about_order->good}}
                                        Кг.
                                    </td>
                                    <td>
                                        @if(is_null($about_order->bad))
                                        -
                                        @endif
                                        {{$about_order->bad}}
                                        Кг.
                                    </td>
                                    <td>
                                        {{$about_order->created_at}}
                                    </td>
                                    @role('worker')

                                        <td class="d-flex justify-content-center">
                                            <button class="removeAbout  btn-danger" data-about-id="{{$about_order->id}}" type="button" style="width: 25px;
                                                height: 25px;
                                                border-radius: 50%;
                                                display: flex;
                                                justify-content: center;
                                                align-items: center;
                                                font-size: 15px;">
                                            <i class="fa fa-remove" aria-hidden="true" ></i>    
                                            </button>   
                                        </td>
                                    @endrole

                                </tr>
                        @empty
                        empty
                        @endforelse
                            </tbody>
                        </table>
                        
                    </div>
                    @endif
                    @if(!empty($value->about()->get()->toArray()))
                    
                    <div class="products">
                        
                        <hr>
                        <ul class="product-ul">
                        @if($value->products)
                            @forelse($value->products->all() as $productKey=>$product)
                                <li class="product-li" data-order-id="{{$product->orders_id}}">
                                    <div class="product-box product-{{$product->id}} {{$product->type[0]}}-product " data-product-id='{{$product->id}}'>
                                        {{$product->type[0]}}
                                    </div>
                                </li>
                            @empty
                                <li class="text-align-center m-auto">
                                    empty
                                </li>
                            @endforelse
                            @else
                            <li class="text-align-center m-auto">
                                empty
                            </li>
                        @endif
                        @role('worker')
                            @if($value->states[0]->state == 'In Progres')
                                <li class="add-product-box">
                                    <button class="add-product btn-success" data-order-id="{{$value->id}}">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </li>
                            @endif
                        @endrole
                        </ul>
                        
                    </div>
                    <div class="product-about" id="product-about">

                    </div>
                    @endif
                    @role('admin')
                            <button class="deleteOrder btn order-settings-btn  btn-danger" data-remove-id="{{$value->id}}"><i class="fa fa-check" aria-hidden="true"></i></button>
                    @endrole
                    </div>  
                    <hr>
                    @empty
                    <div class="empty-order">
                        <hr>
                        <h6 style="text-transform: uppercase;">
                            нет данных !!
                        </h6>   
                        <hr>
                    </div>
                    
                @endforelse
            </div>
        </div>
    </div>  
        <div class="order-settings-box btn-groupe">
        @role('admin')
            <button id="addOrder" class="btn order-settings-btn  btn-light"><i class="fa fa-plus" aria-hidden="true"></i></button>
            <button id="editOrder" class="btn order-settings-btn  btn-light"><i class="fa fa-edit" aria-hidden="true"></i></button>
            <button id="removeOrder" class="btn order-settings-btn  btn-light"><i class="fa fa-trash" aria-hidden="true"></i></button>
        </div>
        @endrole
        <input type="hidden" id="actionAboutForm" name="actionAboutForm" value="{{route("system.about.orders.form")}}">
<input type="hidden" name="actionAddAbout" id="actionAddAbout" value="{{route("system.about.orders.add")}}">
<input type="hidden" name="actionRemoveAbout" id="actionRemoveAbout" value="{{route("system.about.orders.remove")}}">
<input type="hidden" name="actionRemoveOrder" id="actionRemoveOrder" value="{{route("system.orders.remove")}}">
<input type="hidden" name="actionAboutProduct" id="actionAboutProduct" value="{{route("system.orders.product.about")}}">
<input type="hidden" name="actionAddProduct" id="actionAddProduct" value="{{route("system.orders.product.add")}}">

</div>

<div id="about-form-box">

</div>