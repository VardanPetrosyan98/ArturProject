<form id="about-order-form" method="POST" style=" width: max-content;
height: max-content;
border: 1px solid;
padding: 15px 10px 10px 10px;
box-shadow: inset 0px 0px 10px 0px black;
border-radius: 5px;
background-color: white;">
@csrf
    <fieldset class="row m-0 d-flex justify-content-center">
        <legend style="border-bottom: 1px solid #00000052;display: flex;
        border-bottom: 1px solid #00000052;
        justify-content: space-between;">
            <p>ЗАКАЗ No:{{$order->id}}</p>
            <button class="cancel  btn-danger" id="cloasAboutForm" type="button" style="width: 25px;
            height: 25px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 15px;">
        <i class="fa fa-times" aria-hidden="true" ></i>    
        </button>
        </legend>
        <div class="col-md-6">
            <div class="form-group">
                <label for="orderId">OrderId</label>
                <br>
                <input type="hidden" value="{{$order->id}}"  name="orderId" id="orderId" aria-describedby="orderId" >
                <input type="number" style=" border: 0;
                border-bottom: 1px solid;
                padding: 10px 0px;
                width:100%;
                display:inline-block;"  class="form-control"   value="{{$order->id}}">
                </div>
                <div class="form-group">
                <label for="clippings">Clippings</label>
                <br>
                <input type="number" style=" border: 0;
                border-bottom: 1px solid;
                padding: 10px 0px;
                width:100%;
                display:inline-block;" name="clippings" class="form-control" id="clippings" placeholder="clippings">
                </div>
                <div class="form-group">
                <label for="clay">Clay</label>
                <br>
                <input type="number" style=" border: 0;
                border-bottom: 1px solid;
                padding: 10px 0px;
                width:100%;
                display:inline-block;" name="clay" class="form-control" id="clay" placeholder="clay">
                </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="_7d">_7d</label>
                <br>
                <input type="number" style=" border: 0;
                border-bottom: 1px solid;
                padding: 10px 0px;
                width:100%;
                display:inline-block;" name="_7d" class="form-control" id="_7d" aria-describedby="_7d" placeholder="_7d">
                </div>
                <div class="form-group">
                <label for="good">	Good</label>
                <br>
                <input type="number" style=" border: 0;
                border-bottom: 1px solid;
                padding: 10px 0px;
                width:100%;
                display:inline-block;" class="form-control" name="good" id="good" placeholder="good">
                </div>
                <div class="form-group">
                <label for="bad">Bad</label>
                <br>
                <input type="number" style=" border: 0;
                border-bottom: 1px solid;
                padding: 10px 0px;
                width:100%;
                display:inline-block;" name="bad" class="form-control" id="bad" placeholder="bad">
                </div>
        </div>
        <button id="addAboutOrderbtn" type="button" class="btn-success" style="    margin: 0px 10px;
        display: inline-block;
        cursor: pointer;
        border-radius: 10px;
        padding: 5px 10px;
        ">Добавить</button>
    </fieldset>

</form>