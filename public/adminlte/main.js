$('.delete').click(function(){
    var res = confirm('Удалить заказ?');
    if(!res) return false;
});

$('.sidebar-menu a').each(function(){
    var location = window.location.protocol + '//' + window.location.host + window.location.pathname;
    var link = this.href;
    if(link == location){
        $(this).parent().addClass('active');
        $(this).closest('.treeview').addClass('active');
    }
});

// Загрузка картинки
// https://dcrazed.com/html5-jquery-file-upload-scripts/

var buttonSingle = $("#single"),
    file;
new AjaxUpload(buttonSingle, {
    action: adminpath + buttonSingle.data('url') + "?upload=1",
    data: {name: buttonSingle.data('name')},
    name: buttonSingle.data('name'),
    onSubmit: function(file, ext){
        if (! (ext && /^(jpg|png|jpeg|gif)$/i.test(ext))){
            alert('Ошибка! Разрешены только картинки');
            return false;
        }
        buttonSingle.closest('.file-upload').find('.overlay').css({'display':'block'});

    },
    onComplete: function(file, response){
        setTimeout(function(){
            buttonSingle.closest('.file-upload').find('.overlay').css({'display':'none'});

            response = JSON.parse(response);
            $('.' + buttonSingle.data('name')).html('<img src="/images/' + response.file + '" style="max-height: 150px;">');
        }, 1000);
    }
});