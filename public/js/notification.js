let systemOrder
let orderId

// $(document).on('click','.news',function(){
//     $('.active-swipe').click()
//     systemOrder = $(this).data('system')
//     orderId = $(this).data('id')
//     $('.btn-system').removeClass('btn-active')
//     $('.news').removeClass('btn-active')
//     $('.btn-system[data-system="orders"]').toggleClass('btn-active')
//     $(this).toggleClass('btn-active')
//     for(let i = 0 ; i< $('.options-radio').length ; i++){
//     $('.options-radio')[i].checked = false;
    

//     }
//     actionSystemsOrder(systemOrder, orderId )
// })
// function actionSystemsOrder(systemOrder,orderId){
//     $('#leftBar').load(`/system/${systemOrder}?id=${orderId} #content`);
// }
$(document).on('click','#swipe',function(){
    console.log('a')
    $('#swipe').toggleClass('active-swipe')
    $('#notification').toggleClass('active-notification')
})
$(document).on('click','.read_notify',function(){
    var notif_id   = $(this).data('notifId');
    var action = $('#notifMarkAsRead').val();
    var unread_notify = $(this).parents('.unread_notify')
    $.post(action, {'notif_id': notif_id,_token: $('meta[name="csrf-token"]').attr('content')}, function (data) {
        unread_notify.hide(1000)
        data ? $('#news-box').load(`/ #news-box>*`) : false;
    }, 'json');

    return false;
})