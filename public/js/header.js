let option

$('.switch').on('click',function(){
    option= $(this).data('option')
    $('.btn-system').removeClass('btn-active')

    actionOptions(option)
})
function actionOptions(option){
  $('#leftBar').load(`/options/${option} #content`);
}