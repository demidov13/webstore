$('.delete').click(function(){
    var res = confirm('Удалить заказ?');
    if(!res) return false;
});