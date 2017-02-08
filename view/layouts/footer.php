<div class="container">
    <div class="row footer">
        <div class="col-sm-2 foot Height_adjustment">
            <a href="#" class="sect">О нас</a>
            <br>
            <a href="#" class="sect">Новости</a>
        </div>
        <div class="col-sm-2 foot Height_adjustment">
            <a href="#" class="sect">Контакты</a>
            <br>
            <a href="#" class="sect Height_adjustment">Доставка</a>
        </div>
        <div class="col-sm-3 foot Height_adjustment">
            <a href="#" class="sect">FAQ</a>
            <br>
            <a href="#" class="sect">Личный кабинет</a>
        </div>
        <div class="col-sm-2 foot Height_adjustment">
            <a href="#" class="sect">Мы в соцсетях</a>
            <br>
            <a href="#"><i class="fa fa-vk" title="Мы вКонтакте"></i></a>
            <a href="#"><i class="fa fa-instagram" title="Мы в Инстаграм"></i></a>
        </div>
        <div class="col-sm-3 Height_adjustment">
            <a href="#" class="sect">Адрес/e-mail</a>
            <br>
            <a href="#" class="sect">+375(29)504-23-00</a>
        </div>
        <div style="clear: both;"></div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.js" type="text/javascript"></script>

<script> // скрипт для выравнивания высоты блоков
    /*  на jQuery для блоков футера с классом .Height_adjustment */
    jQuery(function ($)  {
        var max_col_height = 0; // максимальная высота, первоначально 0
        $('.Height_adjustment').each(function () { // цикл "для каждой из колонок"
            if ($(this).height() > max_col_height) { // если высота колонки больше значения максимальной высоты,
                max_col_height = $(this).height(); // то она сама становится новой максимальной высотой
            }
        });
        $('.Height_adjustment').height(max_col_height); // устанавливаем высоту каждой колонки равной значению максимальной высоты
    });

    /*  на jQuery для блоков карточек товара с классом .thumbnail */
    jQuery(function ($) {
        var max_col_height = 0;
        $('.thumbnail').each(function () {
            if ($(this).height() > max_col_height) {
                max_col_height = $(this).height();
            }
        });
        $('.thumbnail').height(max_col_height);
    });
</script>




</body>
</html>