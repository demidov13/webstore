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

// Удаление из корзины конкретного товара
$('#cart .modal-body').on('click', '.del-item', function(){
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('Ошибка! Попробуйте позже!');
        }
    });
});

// Вывод корзины на экран showCart и getCart
function showCart(cart){
    if($.trim(cart) == '<h3>Корзина пуста</h3>'){
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'none');
    }else{
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'inline-block');
    }
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
    if($('.cart-sum').text()){
        var totalPrice = $('#cart .cart-sum').text();
        $('.simpleCart_total').html(totalPrice);
    }else{
        $('.simpleCart_total').text('Корзина пуста');
    }
}

function getCart() {
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('Ошибка! Попробуйте позже');
        }
    });
}
/*Корзина конец*/