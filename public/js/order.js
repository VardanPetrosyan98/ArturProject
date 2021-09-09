$(document).on('click','#successOrder',function(){
    $(".error").remove();

    $('#addOrderForm input').each(function( ) {
        if($(this).val().length  == 0){
            $(this).addClass('error');
        }
    });
    if($(".error").length > 0 ) return false;
    $('#add-order-box').toggleClass('active')
    setTimeout(function(){
        $('#add-order-box').css('position','absolute')
    }, 700);
    let action = $("#addOrderForm").attr('action'); 
    // Initialize
    
    // Bind
    
    let post =  $.post(action, $('#addOrderForm').serialize(),function(result) {
        // console.log(result)  
        $('#leftBar').load(`/system/orders #content`);
    })
})
$(document).on('input','.filter-order',function(){
    let value = [];
    let filterOrder = $('.filter-order');
    let action = `system/orders/filter?`;
    for(let i = 0 ; i<filterOrder.length; i++){
        if(filterOrder[i].value !== ''){
            action += `&${filterOrder[i].name}=${filterOrder[i].value}`
        }
    }
    $('#created-orders-box').load(`${action} #orders-list `);
})
$(document).on('click','#addOrder',function(){
    $('#add-order-box').toggleClass('active')
    $('#add-order-box').css('position','relative')
    let html = `
            <hr class="mt-0">
                <div class="news px-2 py-1 order" data-system="orders" data-id="{{$key+1}}">
                    <h5 class="m-0 p-0 news-title " >{{ __($value -> title)}} </h5>
                    <p class="m-0 p-0 news-content">{{$value->content}}</p>
                    <span class="m-0 p-0 news-time">{{$value->createTime}}</span>
                </div>
            <hr>
            `
})

$(document).on('click','#removeOrder',function(){
    $('.deleteOrder').toggleClass('active')
    if($('.deleteOrder').hasClass('active')){
        $('.deleteOrder').show('slow')
    }else{
        $('.deleteOrder').hide('slow')
    }
})

$(document).on('click','.deleteOrder',function(){
    let action = $('#actionRemoveOrder').val();
    let parent =  $(this).parent()
    let orderId = $(this).data('removeId')
    let post =  $.post(action, { orderId: orderId,_token: $('meta[name="csrf-token"]').attr('content')},function(result) {
        parent.hide(700, function(){ 
            parent.remove();
             })
        parent.prev().hide('700', function(){ parent.remove(); })
        parent.next().hide('700', function(){ parent.remove(); })
    })
    // parent.prev().css('left','-1000px')
    // parent.next().css('left','-1000px')
    // parent.toggleClass('active')
    
    // setTimeout(function(){
    //     parent.remove()
    //     parent.prev().remove()
    //     parent.next().remove()
    // }, 700);
})

$(document).on('click','.created-order',function(){
    let 
    typeId = $(this).data('typeId'),
    type = $(this).data('type'),
    endTime=$(this).data('endtime'),
    density=$(this).data('density'),
    sizeA=$(this).data('sizeA'),
    sizeB=$(this).data('sizeB'),
    weight=$(this).data('weight'),
    amount=$(this).data('amount');
    // console.log(type,endTime,density,sizeA,sizeB,weight,amount,)
    let addOrder = $('#add-order-box')
    if(addOrder.hasClass('active')){
        $(`#addOrder-type-${typeId}`).addClass('active')
        $(`#addOrder-density`).val(density)
        $(`#addOrder-sizeA`).val(sizeA)
        $(`#addOrder-sizeB`).val(sizeB)
        $(`#addOrder-weight`).val(weight)
        $(`#addOrder-amount`).val(amount)
    }
})


$(document).on('click','.news-about',function(){
    console.log($(this).parent().parent().next())
    $(this).parent().parent().next().toggleClass('active')
})
$(document).on('click','.product-done',function(){
    console.log($(this).parent().parent().next().next())
    $(this).parent().parent().next().next().toggleClass('active')
})

$(document).on('click','.New, .Poused ',function(){
    $('#about-form-box').css({
        "display":'flex',
        "background-color": '#00000087'
    })
    let orderId = $(this).data('orderId')
    let action = `${$('#actionAboutForm').val()}?id=${orderId}`;
    // console.log(action)
    $('#about-form-box').load(`${action} #about-order-form `);
})
$(document).on('click','.Progres',function(){
    let orderId = $(this).data('orderId')
    let action = $('#orderStatus').val();
    console.log(action)
    let post =  $.post(action, {orderId:orderId,status:'Poused',_token: $('meta[name="csrf-token"]').attr('content')},function(result) {
        $('#leftBar').load(`/system/orders #content`);
    })
})
$(document).on('click','#about-form-box',function(e){
    // console.log(e.target.id)
    if(e.target.id == 'cloasAboutForm' || e.target.id == 'about-form-box') {
        $('#about-order-form').remove()
        $('#about-form-box').css({
            "background-color": '#0000',
            "display":'none',
        })
    }
})
$(document).on('click','#addAboutOrderbtn',function(){
    let action = $('#actionAddAbout').val();
    let post =  $.post(action, $('#about-order-form').serialize(),function(result) {
        // console.log(result)
        $('#leftBar').load(`/system/orders #content`);
    })
})
$(document).on('click','.removeAbout',function(){
    let aboutId = $(this).data('aboutId')
    let action = $('#actionRemoveAbout').val();
    let parent = $(this).parent().parent();
    let post =  $.post(action, { aboutId: aboutId,_token: $('meta[name="csrf-token"]').attr('content')},function(result) {
        parent.hide('slow', function(){ parent.remove(); })
        // console.log(parent)
    })
})
// call form add product
$(document).on('click','.add-product',function(){
    let action = $('#actionAddProduct').val();
    let orderId = $(this).data('orderId')
    let productAbout = $(this).parents('.products').next()
    console.log(productAbout)

    let post =  $.post(action, {orderId:orderId,_token: $('meta[name="csrf-token"]').attr('content')}, function(result) {
        productAbout.html(result);

        $('.product-about').addClass('active')  
    })
    
})
// add product after click button
$(document).on('click','#addProductbtn',function(){
    let animthis = $(this)
    let action = $('#actionAddProduct').val();
    let actionAbout = $('#actionAboutProduct').val();
    let post =  $.post(action, $('#product-add-form').serialize(), function(result) {
        console.log($(result).find('.products'))
        $('.products').html($(result).find('.products').html())
        $('.product-about').removeClass('active')  
        $('.product-about').html('');
    })
})
$(document).on('mousedown touchstart','.product-box',function(){
    let animthis = $(this)
    clearTimeout(this.downTimer);
    this.downTimer = setTimeout(function() {
        animthis.addClass('wheel')
        let action = $('#actionAboutProduct').val();
        let productId = animthis.data('productId');
        let post =  $.post(action, {productId:productId,_token: $('meta[name="csrf-token"]').attr('content')}, function(result) {
            $('.product-about').html(result);
            $('.product-about').addClass('active')  
            animthis.removeClass('wheel')
        })
    }, 700); 
   
}).on('mouseup touchend','.product-box',function(e) {
    let animthis = $(this)
    
    clearTimeout(this.downTimer); 
    
})
$(document).on('click','#product-about',function(e){

    console.log(e.target.id)
    if(e.target.id == 'product-about' || e.target.id == 'cloasProductAboutForm') {
    $('.product-about').html('');
    $('.product-about').removeClass('active')
    }else if(e.target.id == 'removeProductbtn'){
        let item = $('#removeProductbtn');
        let action = $('#actionRemoveProduct').val();
         
        let producetId= item.data('productId');
        console.log(producetId)
        let post =  $.post(action, { producetId: producetId,_token: $('meta[name="csrf-token"]').attr('content')},function(result) {
        $('.product-about').removeClass('active')
        $('.product-about').html('');})
        $(`.product-${producetId}`).parent().hide('slow', function(){ 
            $(`.product-${producetId}`).parent().remove(); 
            if($('.product-li').length == 0){
                $('.product-ul').html(`<li class="text-align-center m-auto">
                    empty
                </li>`)
            }
        })
        
    }
})
