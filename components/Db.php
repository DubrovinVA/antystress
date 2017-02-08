<?php

class Db
{

    public static function getConnection()
    {
        $paramsPath = ROOT.'/config/db_params.php'; //параметры соединения вынесены в отдельный файл db_params.php
        $params = include($paramsPath); //получаем массив с параметрами подключения из db_params.php

        $db = new PDO("mysql:host={$params['host']};dbname={$params['dbname']}", $params['user'], $params['password']);
        $db->exec("set names utf8"); //указываем БД, что нужно использовать кодировку utf8
        return $db;
    }
}