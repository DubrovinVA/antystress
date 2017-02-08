<?php

class Product
{

    const SHOW_BY_DEFAULT = 6;

    /*
     * Returns an array of products
     * возвращает массив с последними продуктами
     * в качестве параметра может принимать кол-во продуктов, по умолчанию равен константе SHOW_BY_DEFAULT
     */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);

        $db = Db::getConnection();

        $productList = array();

        $result = $db->query('SELECT id, name, code, price, image, is_new, is_sale, is_hit, is_recommended FROM product ' //поля, которые получаем из базы
            . 'WHERE status = "1"'  //для продуктов, статус которых равен 1
            . 'ORDER BY date DESC '   //сортируем товары по идентификатору по убыванию (т.е. получаем наиболее новые)
            . 'LIMIT ' . $count);   //количество записей

        $i = 0;

        //складываем полученные данные в результирующий массив
        while (($row = $result->fetch())) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $products[$i]['code'] = $row['code'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['image'] = $row['image'];
            $productList[$i]['is_new'] = $row['is_new'];
            $productList[$i]['is_sale'] = $row['is_sale'];
            $productList[$i]['is_hit'] = $row['is_hit'];
            $products[$i]['is_recommended'] = $row['is_recommended'];
            $i++;
        }

        return $productList;
    }

    /**
     * Возвращает список товаров со статусом 1
     * @param type $categoryId <p>id категории</p>
     * @param type $page [optional] <p>Номер страницы</p>
     * @return type <p>Массив с товарами</p>
     */
    public static function getAllProducts($page = 1, $id = false)
    {
        $limit = Product::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        
        if($id) { //проверка запроса AJAX, если $id определена, то проверяем её на соответствие образцам
            if($id == 'namea') {
                $sortString = "ORDER BY title ASC";
            }
            else if ($id == 'named') {
                $sortString = "ORDER BY title DESC";
            }
            else if ($id == 'pricea') {
                $sortString = "ORDER BY price ASC";
            }
            else if ($id == 'priced') {
                $sortString = "ORDER BY price DESC";
            }
        } else { //если $id НЕ определена, то сортируем по умолчанию по id товара по убыванию
            $sortString = "ORDER BY id DESC";
        }

        $sql = 'SELECT id, name, code, price, image, is_new, is_sale, is_hit, is_recommended FROM product '
            . 'WHERE status = 1 '
            . $sortString
            . ' LIMIT :limit OFFSET :offset';
        
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        // Выполнение команды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;

        //складываем полученные данные в результирующий массив
        while (($row = $result->fetch())) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $products[$i]['code'] = $row['code'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['image'] = $row['image'];
            $productList[$i]['is_new'] = $row['is_new'];
            $productList[$i]['is_sale'] = $row['is_sale'];
            $productList[$i]['is_hit'] = $row['is_hit'];
            $products[$i]['is_recommended'] = $row['is_recommended'];
            $i++;
        }

        return $productList;
    }

    /**
     * Возвращает общее число товаров
     */
    public static function getTotalProductsInAll()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM product '
            . 'WHERE status="1"'); //считаем общее кол-во товаров со статуысом 1
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count']; //возвращаем это число = количество товаров
    }

    /**
     * Возвращает число товаров в указанной категории
     */
    public static function getTotalProductsInCategory($categoryId)
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM product '
            . 'WHERE status="1" AND (category_id ="'.$categoryId.'" OR subcategory_id ="'.$categoryId.'") '); //считаем кол-во товаров нужной категории со статусом 1
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count']; //возвращаем это число = количество товаров
    }

    /**
     * Возвращает список товаров в указанной категории
     * @param type $categoryId <p>id категории</p>
     * @param type $page [optional] <p>Номер страницы</p>
     * @return type <p>Массив с товарами</p>
     */
    public static function getProductsListByCategory($categoryId, $page = 1)
    {
        $limit = Product::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT id, name, code, price, image, is_new, is_sale, is_hit, is_recommended FROM product '
            . 'WHERE status = 1 AND category_id = :category_id '
            . 'ORDER BY id ASC LIMIT :limit OFFSET :offset';
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        // Выполнение команды
        $result->execute();
        // Получение и возврат результатов
        $i = 0;
        $products = array();
        while (($row = $result->fetch())) {
              $products[$i]['id'] = $row['id'];
              $products[$i]['name'] = $row['name'];
              $products[$i]['code'] = $row['code'];
              $products[$i]['price'] = $row['price'];
              $products[$i]['image'] = $row['image'];
              $products[$i]['is_new'] = $row['is_new'];
              $products[$i]['is_sale'] = $row['is_sale'];
              $products[$i]['is_hit'] = $row['is_hit'];
              $products[$i]['is_recommended'] = $row['is_recommended'];
              $i++;
        }
        return $products;
    }

    /**
     * Возвращает продукт с указанным id
     * @param integer $id <p>id товара</p>
     * @return array <p>Массив с информацией о товаре</p>
     */
    public static function getProductById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM product WHERE id = :id';
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполнение коменды
        $result->execute();
        // Получение и возврат результатов
        return $result->fetch();
    }

    /**
     * Возвращает список товаров с указанными индентификторами
     * @param array $idsArray <p>Массив с идентификаторами</p>
     * @return array <p>Массив со списком товаров</p>
     */
    public static function getProdustsByIds($idsArray)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Превращаем массив в строку для формирования условия в запросе
        $idsString = implode(',', $idsArray);
        // Текст запроса к БД
        $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)"; // id будет взят из списка идентификаторов $idsString
        $result = $db->query($sql);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Получение и возврат результатов
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['image'] = $row['image'];
            $products[$i]['is_new'] = $row['is_new'];
            $products[$i]['is_sale'] = $row['is_sale'];
            $products[$i]['is_hit'] = $row['is_hit'];
            $products[$i]['is_recommended'] = $row['is_recommended'];
            $i++;
        }
        return $products;
    }

    /**
     * Возвращает список рекомендуемых товаров
     * @return array <p>Массив с товарами</p>
     */
    public static function getRecommendedProducts()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT id, name, price, is_new FROM product '
            . 'WHERE status = "1" AND is_recommended = "1" '
            . 'ORDER BY id DESC');
        $i = 0;
        $productsList = array();
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $productsList;
    }

    /**
     * Возвращает список товаров
     * @return array <p>Массив с товарами</p>
     */
    public static function getProductsList()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT id, name, code, price, image, is_new, is_sale, is_hit, is_recommended FROM product ORDER BY id ASC');
        $productsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['image'] = $row['image'];
            $products[$i]['is_new'] = $row['is_new'];
            $products[$i]['is_sale'] = $row['is_sale'];
            $products[$i]['is_hit'] = $row['is_hit'];
            $products[$i]['is_recommended'] = $row['is_recommended'];
            $i++;
        }
        return $productsList;
    }

    /**
     * Удаляет товар с указанным id
     * @param integer $id <p>id товара</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteProductById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM product WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Редактирует товар с заданным id
     * @param integer $id <p>id товара</p>
     * @param array $options <p>Массив с информацей о товаре</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateProductById($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE product
            SET 
                name = :name, 
                code = :code, 
                price = :price, 
                category_id = :category_id, 
                brand = :brand, 
                availability = :availability, 
                description = :description, 
                is_new = :is_new, 
                is_recommended = :is_recommended, 
                status = :status
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Добавляет новый товар
     * @param array $options <p>Массив с информацией о товаре</p>
     * @return integer <p>id добавленной в таблицу записи</p>
     */
    public static function createProduct($options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO product '
            . '(name, code, price, category_id, brand, availability,'
            . 'description, is_new, is_recommended, status)'
            . 'VALUES '
            . '(:name, :code, :price, :category_id, :brand, :availability,'
            . ':description, :is_new, :is_recommended, :status)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

    /**
     * Возвращает текстовое пояснение наличия товара:<br/>
     * <i>0 - Под заказ, 1 - В наличии</i>
     * @param integer $availability <p>Статус</p>
     * @return string <p>Текстовое пояснение</p>
     */
    public static function getAvailabilityText($availability)
    {
        switch ($availability) {
            case '1':
                return 'В наличии';
                break;
            case '0':
                return 'Под заказ';
                break;
        }
    }

    /**
     * Возвращает путь к изображению
     * @param integer $id
     * @return string <p>Путь к изображению</p>
     */
    public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = '/upload/images/products/';

        // Путь к изображению товара
        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        }

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }

}
