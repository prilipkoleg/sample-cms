<?php

    error_reporting(E_ALL); // вкл отображение ошибок
    ini_set("display_errors","1"); // что то тут не так

    include_once("../system/config.php"); // класс - конфига
    include_once("../system/router.php"); // класс - роутера
    include_once("../system/controller.php"); // класс - контролера
    include_once("../system/layout.php"); // класс - шаблона
    include_once("../system/mysql.php"); // класс - db

    $route = '/';

    //создаю пример блога - это будет наш путь в адресной строке
    if (isset($_GET['page'])) {

        $page = $_GET['page'];
        $config = new Config(include_once("../config.php"));
        $page_router = new Router($page, $config->getConfig('page'));
        $blog_layout = new Blog_Layout($config->getConfig('template'));
        $blog_controller = new Blog_Controller($blog_layout);
        $db_contact = new DataBase($config->getConfig('db'));
        $blog_controller->setAction($page_router->getPath(), $db_contact->db_connect());







        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        exit();
    }

    if(isset($_GET['route'])){ //вот так лучше, теперь мы контролируем то что получаем
        $route = $_GET['route'];
    };



    $config = new Config(include_once("../config.php"));
    $router = new Router($route, $config->getConfig('router')); // сюда нужно передать массив путей нашего приложения, берем их их конфига
    $layout = new Layout($config->getConfig('template')); // тут начнем шаблонизацию
    $controller = new Controller($layout); // контроллер я установил шаблон но візов никуда не передаеться
    $controller->setAction($router->getPath());

    //на основе массива конфигураций будет объект который будет хранить конфигурации и будет везде доступен



	
	/*print_r($config->getConfig('db'));
    echo '<br>';
    print $path = $router->getPath();
    #echo $path; */


    //сейчас проверим что наш конфиг нормальнор работает, через контрл + навести мышкой показывает сигнатуру конструктора если нажать переходим к классу
    //типа да , я зарание настроил локально сайт
    //напутал немного
    //теперь будем урлу разгребать
    //нам нужно сделать так что бы все запросы шли на индех файл
    //теперь из пути нам нужно получить страницу, точнее путь сначала разобрать и определить что он значит
    //пока сделаем более просто, для каждого определеного нами роутера будет свой путь задан