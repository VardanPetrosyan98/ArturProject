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
    .form_radio_group {
	display: inline-block;
	overflow: hidden;
}
.form_radio_group-item {
	display: inline-block;
	float: left;    
}
.form_radio_group input[type=radio] {
	display: none;
}
.form_radio_group label {
	display: inline-block;
	cursor: pointer;
	padding: 0px 15px;
	line-height: 34px;
	/* border: 1px solid #999; */
	border-right: none;
	user-select: none;
    transition: .7s;
    box-shadow: inset 0px 0px 2px 0px black;
}
 
.form_radio_group .form_radio_group-item:first-child label {
	border-radius: 6px 0 0 6px;
} 
.form_radio_group .form_radio_group-item:last-child label {
	border-radius: 0 6px 6px 0;
	border-right: 1px solid #999;
}
 
/* Checked */
.form_radio_group input[type=radio]:checked + label {
	background: #ffe0a6;
    border-bottom: 1px solid;
}
 
/* Hover */
.form_radio_group label:hover {
	color: #666;
}
 
/* Disabled */
.form_radio_group input[type=radio]:disabled + label {
	background: #efefef;
	color: #666;
}
#weight-product{
    border: 1px solid #00000045!important;
}
    
    </style>
    <form id="product-add-form" method="POST" style=" width: max-content;
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
    <input type="hidden" name="add" value="true" id="">
    <input type="hidden" name="orderId" value={{$orderId}}>
        <fieldset class="row m-0 d-flex justify-content-center">
            <legend style="border-bottom: 1px solid #00000052;display: flex;
            border-bottom: 1px solid #00000052;
            justify-content: space-between;">
                <p>ПРАДУКТ No:{{1+1}}</p>
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
            <div class="row col-md-11 d-flex justify-content-center p-0" style="border-bottom: 1px solid #0000005e;margin: 0 auto 10px;padding-bottom: 10px!Important;">
                <div class="form_radio_group col-md-12 p-0 d-flex justify-content-center">
                    <div class="form_radio_group-item">
                        <input id="radio-1" type="radio" name="radio" value="small">
                        <label for="radio-1">SMALL</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-2" type="radio" name="radio" value="normal" checked>
                        <label for="radio-2">NORMAL</label>
                    </div>
                    <div class="form_radio_group-item">
                        <input id="radio-3" type="radio" name="radio" value="big">
                        <label for="radio-3">BIG</label>
                    </div>
                </div>
                <input  type="text" name="weight" id="weight-product" placeholder="вес">
            </div>
            <button id="addProductbtn" type="button" class="btn-success" style="margin: 0px 10px;
            display: inline-block;
            cursor: pointer;
            border-radius: 10px;
            padding: 5px 10px;
            ">ДОБАВИТЬ</button>
        </fieldset>
    
    </form>