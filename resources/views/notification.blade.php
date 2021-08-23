    
    <div class="news-box " id="news-box">
        <div id="count-notification" class="news-true">
            {{count($notifyOrder)}}
        
        </div>
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
    @forelse($notifyOrder as $key => $value)
    @if(is_null($value->read_at))
                <hr class="mt-0">
                
            <div class="created-order px-2 py-1 news @if(!$value->read_at)unread_notify @endif" data-type-id="{{$value->notifiable_id}}" data-type="{{json_decode($value->data)->data->type}}" data-endTime="{{json_decode($value->data)->data->endTime}}" data-density="{{json_decode($value->data)->data->density}}" data-size-a="{{json_decode($value->data)->data->sizeA}}" data-size-b="{{json_decode($value->data)->data->sizeB}}" data-weight="{{json_decode($value->data)->data->weight}}" data-amount="{{json_decode($value->data)->data->amount}}" data-system="orders" data-id="{{$key+1}}">
                <h5 class="m-0 p-0 news-title created-order d-flex justify-content-between" >
                    <span class="num-order">
                    No. {{json_decode($value->data)->data -> id}} 
                    </span>
                    <span class="createdAt-order">
                    {{__('создано')}}: {{json_decode($value->data)->data->created_at}} 
                    </span>
                </h5>
                <p class="m-0 p-0 news-content"> 
                <span class="info-order-title">
                    {{__('Заказ')}}
                </span>::
                <span class="info-order">
                    {{__('Срок')}} 
                </span>
                - ( {{json_decode($value->data)->data->endTime}} ), 
                <span class="info-order">
                    {{__('Тип')}} 
                </span>
                - {{json_decode($value->data)->data->type}},  
                <span class="info-order">
                    {{__('Плотность')}}
                </span>
                - {{json_decode($value->data)->data->density}} Г., 
                <span class="info-order">
                    {{__('Размер')}} 
                </span>
                - ( {{json_decode($value->data)->data->sizeA}} X {{json_decode($value->data)->data->sizeB}} ) М., 
                <span class="info-order">
                    {{__('Вес')}} 
                </span>
                - {{json_decode($value->data)->data->weight}} Кг, 
                <span class="info-order">
                    {{__('Количество')}}  
                </span>
                - {{json_decode($value->data)->data->amount}} Ш
                            <br>
                <span class="info-order">
                    {{__('Кратко')}}
                </span>
                ::
                            ( {{json_decode($value->data)->data->type}} ),
                            {{json_decode($value->data)->data->density}} Г.,
                            ( {{json_decode($value->data)->data->sizeA}} X {{json_decode($value->data)->data->sizeB}} ) М.,
                            {{json_decode($value->data)->data->weight}} Кг
                            -
                            {{json_decode($value->data)->data->amount}} Ш

                        </p>
                        <div class="order-footer">
                            <span class="m-0 p-0 news-time">{{__('СРОК ДО')}}: ({{json_decode($value->data)->data->endTime}}), </span>
                            <div>
                            <button class="read_notify btn  btn-success" data-notif-id="{{$value->notifiable_id}}"><i class="fa fa-eye" aria-hidden="true"></i></button>
                            <span class="state {{$value->notifiable_variables->states[0]->state}}">{{__($value->notifiable_variables->states[0]->state)}}</span>
                            </div>
                        </div>
                    </div>
                <hr>
        @endif
                    @empty 
                    <hr>
                    <p>Нет новых уведомлений</p>
                    <hr>
            @endforelse
    </div>
    <div id="swipe">
        <i class="first fa fa-angle-up" aria-hidden="true"></i>
        <i class="second fa fa-angle-up" aria-hidden="true"></i>
    </div>
<input type="hidden" name="notifMarkAsRead" id="notifMarkAsRead" value="{{route('notif.mark.as.read')}}">