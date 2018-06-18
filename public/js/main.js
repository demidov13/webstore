// Изменение цены в карточке товара при смене производителя.
$('.available select').on('change', function(){
    var modId = $(this).val(),
        title = $(this).find('option').filter(':selected').data('title'),
        price_factor = $(this).find('option').filter(':selected').data('price'),
        basePrice = $('#base-price').data('base'),
        oldPrice = $('#old-price').data('old');    
    if(price_factor){
        var newPrice = basePrice * price_factor;
        $('#base-price').text(newPrice + " грн.");
        if(oldPrice) {
            var newOldPrice = oldPrice * price_factor;
            $('#old-price').text(newOldPrice);
        }
    }
});

/*Корзина начало*/
$('body').on('click', '.add-to-cart-link', function(e){
     e.preventDefault();
     var id = $(this).data('id'),
         qty = $('.quantity input').val() ? $('.quantity input').val() : 1,
         mod = $('.available select').val();
     $.ajax({
         url: '/cart/add',
         data: {id: id, qty: qty, mod: mod},
         type: 'GET',
         success: function(res){
             showCart(res);
         },
         error: function(){
             alert('Ошибка! Попробуйте позже');
         }
     });
});

function showCart(cart){
    console.log(cart);
}
/*Корзиина конец*/