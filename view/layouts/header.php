<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Главная</title>
    <link href="/template/css/bootstrap.css" rel="stylesheet">
    <link href="/template/css/font-awesome.css" rel="stylesheet">
    <link href="/template/css/mainstyle.css" rel="stylesheet">
    
    <script src="/js/main.js" type="text/javascript"></script>
    <!--[if lt IE 9]>
    <script src="/template/js/html5shiv.js"></script>
    <![endif]-->
</head>

<body>
<div class="navbar navbar-default navbar-static-top nav-fon">
    <div class="container">
        <div class="navbar navbar-header nav-header-width">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
                <span class="sr-only">Открыть навигацию</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/"><img src="/template/images_for_toys/logo.png" class="logo" alt="" title="На главную"/></a>
        </div>

        <div class="collapse navbar-collapse" id="responsive-menu">
            <div>
                <ul class="nav navbar-nav navbar-right nav-width">
                    <li class="nav-tlf">
                        <a href="#">+375(29)504-23-00</a>
                    </li>
                    <?php if (User::isGuest()): ?>
                        <li class="nav-input nav-color"><a href="/user/login/"><i class="fa fa-lock"></i> Вход</a></li>
                        <li class="nav-reg nav-color"><a href="/user/register/"><i class="fa fa-user-plus"></i> Регистрация</a></li>
                    <?php else: ?>
                        <li class="nav-input nav-color"><a href="/cabinet/"><i class="fa fa-user"></i> Аккаунт</a></li>
                        <li class="nav-input nav-color"><a href="/user/logout/"><i class="fa fa-unlock"></i> Выход</a></li>
                    <?php endif; ?>
                    <li class="nav-vk">
                        <a href="#"><i class="fa fa-vk fa-lg" title="Мы вКонтакте"></i></a>
                    </li>
                    <li class="nav-in">
                        <a href="#"><i class="fa fa-instagram fa-lg" title="Мы в Инстаграм"></i></a>
                    </li>
                </ul>
            </div>

            <div>
                <ul class="nav navbar-nav navbar-right nav-width">
                    <li class="nav-search">
                        <input type="text" class="form-control search" placeholder="Поиск" value="">
                    </li>
                    <li class="nav-k nav-color">
                        <a href="/cart">
                            <img src="/template/images_for_toys/korzina.png" alt="" title="В корзину"/> Корзина(
                            <span id="cart-count"><?php echo Cart::countItems(); ?></span>
                            )
                        </a>
                    </li>
                    <li class="nav-q">
                        <a href="#" class="btn">Задать<br>вопрос</a>
                    </li>
                </ul>
            </div>

            <div>
                <ul class="nav navbar-nav navbar-right nav-menu">
                    <li>
                        <a href="/">Главная</a>
                    </li>
                    <li>
                        <a href="/about/">О нас</a>
                    </li>
                    <li>
                        <a href="/catalog/">Каталог</a>
                    </li>
                    <li>
                        <a href="/contacts/">Контакты</a>
                    </li>
                    <li>
                        <a href="#">Доставка</a>
                    </li>
                    <li>
                        <a href="#">FAQ</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>