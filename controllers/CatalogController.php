<?php

//чтобы использовать модели в контроллере, подключаем их
include_once ROOT.'/models/Category.php';
include_once ROOT.'/models/Product.php';
include_once ROOT.'/components/Pagination.php';

/**
 * Контроллер CatalogController
 * Каталог товаров
 */
class CatalogController
{

    /**
     * Action для страницы "Каталог товаров"
     */
    public function actionIndex($page = 1)
    {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

        print_r($_POST);

        // Список товаров
        if ($_POST['sort_id']) {
            $id = strip_tags($_POST['sort_id']);
            $allProducts = Product::getAllProducts($id);
        } else {
            $allProducts = Product::getAllProducts();
        }

        // Общее количество товаров (необходимо для постраничной навигации)
        $total = Product::getTotalProductsInAll();

        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        // Подключаем вид
        require_once(ROOT . '/view/catalog/index.php');
        return true;
    }

    /**
     * Action для страницы "Категория товаров"
     */
    public function actionCategory($categoryId, $page = 1)
    {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

        // Список товаров в категории
        $categoryProducts = Product::getProductsListByCategory($categoryId, $page);

        // Общее количество товаров данной категории (необходимо для постраничной навигации)
        $total = Product::getTotalProductsInCategory($categoryId);

        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        // Подключаем вид
        require_once(ROOT . '/view/catalog/category.php');
        return true;
    }

}