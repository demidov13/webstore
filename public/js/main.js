/* Фильтры */

$('body').on('click', '.priceSubmit', function() {
    var price1, price2;
    if($('input[name = price1]').val()) {
        price1 = $('input[name = price1]').val();
    } else {
        price1 = 1;
    }
    if($('input[name = price2]').val()) {
        price2 = $('input[name = price2]').val();
    } else {
        price2 = 999999;
    }
    $.ajax({
        url: location.href,
        data: {price1: price1, price2: price2},
        type: 'GET',
        beforeSend: function(){
            $('.preloader').fadeIn(300, function(){
                $('.product-one').hide();
            });
        },
        success: function(res){
            $('.preloader').delay(500).fadeOut('slow', function(){
                $('.product-one').html(res).fadeIn();
                var urlPrice = location.search.replace(/price1(.+?)(&|$)/g, '');
                urlPrice = urlPrice.replace(/price2(.+?)(&|$)/g, '');
                var newURLprice = location.pathname + urlPrice + (location.search ? "&" : "?") + "price1=" + price1 + "&" + "price2=" + price2;
                newURLprice = newURLprice.replace('&&', '&');
                newURLprice = newURLprice.replace('?&', '?');
                history.pushState({}, '', newURLprice);
            });
        },
        error: function () {
            alert('Ошибка!');
        }
    });
});

$('body').on('change', '.filters input', function(){
    var checked = $('.filters input:checked'),
        data = '';
    checked.each(function () {
        data += this.value + ',';
    });
    if(data){
        $.ajax({
            url: location.href,
            data: {filter: data},
            type: 'GET',
            beforeSend: function(){
                $('.preloader').fadeIn(300, function(){
                    $('.product-one').hide();
                });
            },
            success: function(res){
                $('.preloader').delay(500).fadeOut('slow', function(){
                    $('.product-one').html(res).fadeIn();
                    var url = location.search.replace(/filter(.+?)(&|$)/g, '');
                    var newURL = location.pathname + url + (location.search ? "&" : "?") + "filter=" + data;
                    newURL = newURL.replace('&&', '&');
                    newURL = newURL.replace('?&', '?');
                    history.pushState({}, '', newURL);
                });
            },
            error: function () {
                alert('Ошибка!');
            }
        });
    }else{
        window.location = location.pathname;
    }
});

/* Фильтры конец */

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

// Удаление из корзины всех товваров
function clearCart() {
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('Ошибка! Попробуйте позже');
        }
    });
}

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

/* Поиск начало */
var products = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: '%QUERY',
        url: path + '/search/typeahead?query=%QUERY'
    }
});

products.initialize();

$("#typeahead").typeahead({
    // hint: false,
    highlight: true
},{
    name: 'products',
    display: 'title',
    limit: 10,
    source: products
});

$('#typeahead').bind('typeahead:select', function(ev, suggestion) {
    // suggestion объект,получаемый при поиске
    window.location = path + '/search/?s=' + encodeURIComponent(suggestion.title);
});
/* Поиск конец */
