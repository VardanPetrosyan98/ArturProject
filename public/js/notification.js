let systemOrder
let orderId

$(document).on('click','.news',function(){
    $('.active-swipe').click()
    systemOrder = $(this).data('system')
    orderId = $(this).data('id')
    $('.btn-system').removeClass('btn-active')
    $('.news').removeClass('btn-active')
    $('.btn-system[data-system="orders"]').toggleClass('btn-active')
    $(this).toggleClass('btn-active')
    for(let i = 0 ; i< $('.options-radio').length ; i++){
    $('.options-radio')[i].checked = false;
    

    }
    actionSystemsOrder(systemOrder, orderId )
})
function actionSystemsOrder(systemOrder,orderId){
    $('#leftBar').load(`/system/${systemOrder}?id=${orderId} #content`);
}
$(document).on('click','#swipe',function(){
    console.log('a')
    $('#swipe').toggleClass('active-swipe')
    $('#notification').toggleClass('active-notification')
})
