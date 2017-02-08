/* сортировка товаров */

$(document).ready(function () {
    $(".sort span").click(function () {
        var id = $(this).attr('id');
        $("#fon").css({'display':'block'});
        $("#load").fadeIn(1000,function () {
            $.ajax({
                url:'/template/view/catalog/index.php', //адрес файла к которому обращаемся
                data:'sort_id=' +id, //данные, отправляемые на сервер
                type:'post', //тип запроса;
                success:function (html) {

                    $("#tovar").html(html).hide().fadeIn(2000);
                    $("#fon").css({'display':'none'});
                    $("#load").fadeOut(1000);
                }

            });
        });
    });
});