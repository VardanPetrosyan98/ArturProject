let system
$(document).on('click','.btn-system',function(){
    system = $(this).data('system')
    $('.btn-system').removeClass('btn-active')
    $(this).toggleClass('btn-active')
    for(let i = 0 ; i< $('.options-radio').length ; i++){
    $('.options-radio')[i].checked = false;
    

    }
    actionSystems(system )
})
function actionSystems(system){
    console.log(system)
    $('#leftBar').load(`/system/${system} #content`);
}