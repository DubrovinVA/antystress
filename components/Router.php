<?php

class Router
{
    private $routes; // приватное свойство routes, это массив, в котором будут храниться маршруты

    public function __construct() // метод
    {
        $routesPath = ROOT.'/config/routes.php'; // указываем путь к роутам, ROOT - путь к базовой директории, /config/routes.php - путь к созданному файлу с маршрутами routes.php
        $this->routes = include($routesPath); // присваиваем свойству routs массив, который хранится в файле routes.php
    }


    /*
     * Method returns request string
     */
    private function getURI() //метод объявляем приватным, т.к. собираемся обращаться к нему только из этого класса
    {
        if (!empty($_SERVER['REQUEST_URI'])) { //из глобальной переменной $_SERVER по ключу REQUEST_URI получаем строку запроса пользователя (то, что он набрал в адресной строке после названия сайта и слэша)
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run() // метод, который будет принимать управление от FRONT CONTROLLER
    {
        #echo 'Class Router, method run<br>'; //простое сообщение для проверки работоспособности метода

        //получить строку запроса
        $uri = $this->getURI();

        //проверить наличие такого запроса в файле routes.php
        foreach ($this->routes as $uriPattern=>$path) { //для каждого маршрута из массива routes мы помещаем в переменную $uriPattern строку запроса (например news) а в переменную $patch путь для этого запроса (в случае запроса news это путь news/index)

            //сравниваем $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)) { //в регулярном выражении используем тильды ~ вместо сэшей /, т.к. в наших маршрутах могут содержаться слэши (news/index и т.д.)
                // если условие соблюдается, то в переменной $path будет храниться имя контроллера и экшена для нужного сценария (т.е. для набранной адресной строки)

//                // если есть совпадение, определить, какой контроллер
//                // и экшен обрабатывают запрос
//
//                $segments = explode('/', $path); //функция explode() в данном случае разделяет строку $path на две части в месте нахождения /, и помещает обе части в массив
//                #echo '<pre>';
//                #print_r($segments);
//                #echo '</pre>';
//
//                // получаем имя контроллера
//                $controllerName = array_shift($segments).'Controller'; //ф-я array_shift получает значение первого элемента массива и удаляет его из массива
//                //приводим имя контроллера к нужному, т.е. пишущемуся с заглавной буквы
//                $controllerName = ucfirst($controllerName); //ф-я ucfirst() делает первую букву строки заглавной
//
//                //аналогично пполучаем и приводим к нужному виду наименование экшена
//                $actionName = 'action'.ucfirst(array_shift($segments));
//
//                //проверяем, как всё работает
//                #echo 'Класс: '.$controllerName.'<br>';
//                #echo 'Метод: '.$actionName;
//
//                //подключить файл класса-контроллера
//                $controllerFile = ROOT.'/controllers/'. //здесь мы определяем файл, который нужно подключить
//                        $controllerName.'.php';         //для этого мы прописываем путь к нему, используя имя класса
//
//                if (file_exists($controllerFile)) { //проверяем, существует ли файл класса-контроллера
//                    include_once($controllerFile);  //подключаем этот файл
//                }
//                //создать объект, вызвать метод (т.е. action)
//                $controllerObject = new $controllerName; //вместо имени класса подставляем переменную с его именем
//                $result = $controllerObject->$actionName();
//                if ($result != null) {  //если метод сработал (вернул true), то обрываем цикл, который ищет совпадения в маршрутах
//                    break;
//                }

                #выбираем из ЧПУ-адреса данные для просмотра одной новости
//                echo '<br>Где ищем (запрос, который набрал пользователь): '.$uri;
//                echo '<br>Что ищем (совпадение из правила): '.$uriPattern;
//                echo '<br>Кто обрабатывает: '.$path;

                //получаем внутренний путь из внешнего согласно правилу
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri); //в строке запроса, например сайт/news/sport/114 мы ищем параметры sport и 114 по шаблону $uriPattern (который содержиться в 'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2' в файле Router.php)
                    //если находим эти параметры, то в строку $path (которая описывается так 'news/view/$1/$2', мы подставляем $1 и $2
                    //в результате получаем т.н. внутренний маршрут $internalRoute

                //Определяем контроллер, экшен, параметры
                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action'.ucfirst(array_shift($segments));
                $parameters = $segments;

                //Подключаем файл класса-контроллера
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';

                if (file_exists($controllerFile)) {
                    include_once ($controllerFile);
                }

                //создать объект, вызвать метод (т.е. action)
                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters); 
                if ($result != null) {
                    break;
                }


            }
        }

    }

}