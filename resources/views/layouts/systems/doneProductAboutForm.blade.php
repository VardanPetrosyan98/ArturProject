<style>
@keyframes formAnimate {
  from {
    top: 0px;
    opacity: 0;
}
  to {
    top: 200px;
    opacity: 1
    ;}
}
button#cloasProductAboutForm:after {
    content: "";
    width: 25px;
    height: 25px;
    position: absolute;
    top: -2px;
    background-color: #0000;
    left: -2px;
    z-index: 99;
    border-radius: 50%;
}

</style>
<form id="product-about-order-form" method="POST" style=" width: max-content;
top:200px;
position: relative;
height: max-content;
border: 1px solid;
padding: 15px 10px 10px 10px;
box-shadow: inset 0px 0px 10px 0px black;
border-radius: 5px;
background-color: white;
animation: formAnimate 1s infinite ;
animation-iteration-count: 1; ">
@csrf
    <fieldset class="row m-0 d-flex justify-content-center">
        <legend style="border-bottom: 1px solid #00000052;display: flex;
        border-bottom: 1px solid #00000052;
        justify-content: space-between;">
            <p>ПРАДУКТ No:{{$product->id}}</p>
            <button class="cancel  btn-danger" id="cloasProductAboutForm" type="button" style="width: 25px;
            height: 25px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 15px;
            z-index:9999;
            position: relative;">
        <i class="fa fa-times" aria-hidden="true" ></i>    
        </button>
        </legend>
        <div class="col-md-11">
          <input type="hidden" nama="productId" value="1">
          <p>{{__('Создано')}}::{{$product->created_at}}</p>
          <p>{{__('Тип')}}::<span>{{$product->type}}</span></p>
          
          <p>{{__('Вес')}}::
            <span>
            @if($product->weight)
            {{$product->weight}} кг.
            @else
                не определено!
            @endif
            </span></p>
        </div>
        <hr>
        <button id="removeProductbtn" type="button" class="btn-danger" style="    margin: 0px 10px;
        display: inline-block;
        cursor: pointer;
        border-radius: 10px;
        padding: 5px 10px;
        ">Удалить</button>
    </fieldset>

</form>