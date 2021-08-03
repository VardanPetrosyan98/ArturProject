<div id="notification">
    <div id="count-notification" class="news-true">
        1
    </div>
    <div class="news-box" id="news-box">
     @foreach($notifyOrder as $key => $value)

        {{-- <hr class="mt-0"> --}}
        {{-- <div class="news px-2 py-1" data-system="orders" data-id="1">
            <h5 class="m-0 p-0 news-title " >{{ __('Заказ')}} 1</h5>
            <p class="m-0 p-0 news-content">{{__('СРОК')}} : <span class="end-time">(13.12.2021)</span>{{__('  ЗАКАЗ')}} (100 ММ 1.5 М 30М)  - 10 {{__('ШТУК')}} </p>
            <span class="m-0 p-0 news-time">{{__('СОЗДАНО')}}: 12.12.2021 17:30</span>
        </div> --}}
        {{-- <div class="created-order px-2 py-1 news " data-id="{{$value->id}}" data-system="orders" data-type-id="{{$value->id}}" data-type="{{$value->type}}" data-endTime="{{$value->endTime}}" data-density="{{$value->density}}" data-size-a="{{$value->sizeA}}" data-size-b="{{$value->sizeB}}" data-weight="{{$value->weight}}" data-amount="{{$value->amount}}" data-system="orders" data-id="{{$key+1}}">
            <h5 class="m-0 p-0 news-title created-order" >No. {{$value -> id}} {{__('создано')}}: {{$value->createTime}} </h5>
            <p class="m-0 p-0 news-content">
                {{__('Заказ')}}::
                {{__('Срок')}} - ( {{$value->endTime}} ), 
                {{__('Тип')}} - {{$value->type}},  
                {{__('Плотность')}} - {{$value->density}} Г., 
                {{__('Размер')}} - ( {{$value->sizeA}} X {{$value->sizeB}} ) М., 
                {{__('Вес')}} - {{$value->weight}} Кг, 
                {{__('Количество')}}  - {{$value->amount}} Ш
                <br>
                {{__('Кратко')}}::
                ( {{$value->type}} ),
                {{$value->density}} Г.,
                ( {{$value->sizeA}} X {{$value->sizeB}} ) М.,
                {{$value->weight}} Кг,
                {{$value->amount}} Ш

            </p>
            
            <span class="m-0 p-0 news-time">{{__('СРОК ДО')}}: ({{$value->endTime}}), </span>
        </div> --}}
        {{-- <hr> --}}
    @endforeach
    @foreach($notifyOrder as $key => $value)
                <hr class="mt-0">
                
                    <div class="created-order px-2 py-1 news " data-type-id="{{$value->id}}" data-type="{{$value->type}}" data-endTime="{{$value->endTime}}" data-density="{{$value->density}}" data-size-a="{{$value->sizeA}}" data-size-b="{{$value->sizeB}}" data-weight="{{$value->weight}}" data-amount="{{$value->amount}}" data-system="orders" data-id="{{$key+1}}">
                        <h5 class="m-0 p-0 news-title created-order d-flex justify-content-between" >
                            <span class="num-order">
                            No. {{$value -> id}} 
                            </span>
                            <span class="createdAt-order">
                            {{__('создано')}}: {{$value->created_at}} 
                            </span>
                        </h5>
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
                        
                        <span class="m-0 p-0 news-time">{{__('СРОК ДО')}}: ({{$value->endTime}}), </span>
                        {{-- <button class="deleteOrder btn order-settings-btn  btn-danger"><i class="fa fa-check" aria-hidden="true"></i></button> --}}
                    </div>
                <hr>
            @endforeach

    </div>
    <div id="swipe">
        <i class="first fa fa-angle-up" aria-hidden="true"></i>
        <i class="second fa fa-angle-up" aria-hidden="true"></i>
    </div>

</div>