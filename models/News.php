<?php

class News
{
    /*
     * Returns single news item with specified id
     * @param integer $id
     */
    public static function getNewsItemById($id) //возвращает одну новость по id
    {
        $id = intval($id);

        if ($id) {

            $db = Db::getConnection(); //получаем параметры подключения к БД
            $result = $db->query('SELECT * from news WHERE id=' . $id); //отличается от getNewsList в осн.тем, что ищем один
                                                                        // результат, используя id в запросе
//            $result->setFetchMode(PDO::FETCH_NUM); //оставляем только индексы в виде номеров колонок
            $result->setFetchMode(PDO::FETCH_ASSOC); //или только в виде названий
            $newsItem = $result->fetch();

            return $newsItem;
        }

    }

    /*
     * Return an array of news items
     */
    public static function getNewsList() //возвращает список новостей
    {
//        //указываем параметры соединения с БД
//        $host = 'localhost';
//        $dbname = 'test2_mvc';
//        $user = 'test2_mvc_user';
//        $password = '123456';
//        /*
//         * создаём объект класса PDO, передаём в конструктор параметры соединения
//         * при помощи это объекта будем "общаться" с БД
//         * основное отличие PDO от mysqli в ОО-подходе
//         */
//        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

        $db = Db::getConnection(); //получаем параметры подключения к БД

        //создаём пустой массив для результатов
        $newsList = array();

        //описываем нужны запрос к БД
        //в данном случае - выбрать 10 последних новостей из таблицы NEWS
        $result = $db->query('SELECT id, title, date, short_content '
            . 'FROM news '
            . 'ORDER BY date DESC '
            . 'LIMIT 10');

        //в цикле записываем полученные данные в массив $newsList
        $i = 0;
        while($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }
        
        return $newsList; //возвращаем массив $newsList с результатами
    }
}