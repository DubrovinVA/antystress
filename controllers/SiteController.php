<?php

//чтобы использовать модели в контроллере, подключаем их
include_once ROOT.'/models/Category.php';
include_once ROOT.'/models/Product.php';

class SiteController
{

    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList(); //вызываем метод для выборки категорий

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(6); //вызываем метод для выборки 6-ти продуктов

        // Список рекомендуемых товаров для слайдера
        $sliderProducts = Product::getRecommendedProducts();

        require_once(ROOT . '/view/site/index.php');

        return true;
    }

    /**
     * Action для страницы "Контакты"
     */
    public function actionContact()
    {
        // Переменные для формы
        $userEmail = false;
        $userText = false;
        $result = false;
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];
            // Флаг ошибок
            $errors = false;
            // Валидация полей
            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Отправляем письмо администратору
                $adminEmail = 'php.start@mail.ru'; //ящик, на который будет отправлено письмо
                $message = "Текст: {$userText}. От {$userEmail}"; //текст письма
                $subject = 'Тема письма'; //тема письма
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }
        // Подключаем вид
        require_once(ROOT . '/view/site/contact.php');
        return true;
    }

    /**
     * Action для страницы "О магазине"
     */
    public function actionAbout()
    {
        // Подключаем вид
        require_once(ROOT . '/view/site/about.php');
        return true;
    }
}