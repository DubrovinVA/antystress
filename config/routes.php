<?php
return array(
    'product/([0-9]+)' => 'product/view/$1', // actionView в ProductController

    'catalog/page-([0-9]+)' => 'catalog/index/$1',  // actionIndex в CatalogController
    'catalog' => 'catalog/index',  // actionIndex в CatalogController

    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', // actionCategory в CatalogController
    'category/([0-9]+)' => 'catalog/category/$1', // actionCategory в CatalogController

    // Корзина:
    'cart/checkout' => 'cart/checkout', // actionCheckout в CartController
    'cart/delete/([0-9]+)' => 'cart/delete/$1', // actionDelete в CartController
    'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd в CartController
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', // actionAddAjax в CartController
    'cart' => 'cart/index', // actionIndex в CartController

    // Пользователь:
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    // О магазине
    'contacts' => 'site/contact',
    'about' => 'site/about',

    // Главная
    '' => 'site/index', // actionIndex в SiteController
);