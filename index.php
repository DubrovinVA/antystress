<?php

// FRONT CONTROLLER

//  Общие настройки
ini_set('display_errors',1); // включаем показ ошибок
error_reporting(E_ALL);

session_start();

//  Подключение файлов системы
define('ROOT', dirname(__FILE__)); //для подключения файлов используем полный путь к файлу на диске,
                                   // его получаем при помощи функции dirname() и псевдоконстанты __FILE__
// подключаем автозагрузку классов
require_once (ROOT.'/components/Autoload.php');

//  Вызов Router
$router = new Router(); //создаем экземпляр класса Router
$router ->run(); //запускаем метод run