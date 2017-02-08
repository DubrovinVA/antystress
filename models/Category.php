<?php

class Category
{
    /*
     * Return an array of categoties
     * возвращает список категорий
     */
    public static function getCategoriesList()
    {

        $db = Db::getConnection();

        $categoryList = array();

        $result = $db->query('SELECT id, name, type FROM category ORDER BY sort_order ASC');

        $i = 0;
        while ( ($row = $result->fetch())) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['type'] = $row['type'];
            $i++;
        }

        return $categoryList;
    }
}