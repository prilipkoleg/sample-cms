<?php
    error_reporting(E_ALL);
    ini_set("display_errors","1");

    print "<meta charset='UTF-8'/>";

    $route = '/';
    $id = 0;

    if(isset($_GET['route'])){
        $route = $_GET['route'];
    };

    if(isset($_GET['id'])){
            $id = $_GET['id'];
    };

    if (is_file('../config.php')) {
        $config_array = require_once('../config.php');
    } else {
        $config_array = require_once('../config.def.php');
    }

    include_once("../system/start_engine.php"); // запускаем движек
    include_once("../system/config.php"); // класс - конфига

    $registry = new Registry();

    $config = new Config($config_array);
    $registry->set('config', $config);

    $DB  = new DBMySQL($config ->get('db')['host'], $config ->get('db')['user'], $config ->get('db')['pass'], $config ->get('db')['name'] );
    $registry->set('db', $DB);

    $loader = new Loader($registry);
    $registry->set('load', $loader);

    $router = new Router($route, $config->get('router'));
    $registry->set('router', $router);

    $layout = new Layout($config->get('template'));
    $registry->set('router', $layout);

    $app = new App($layout, $registry, $id);
    $app->dispatch($router->getPath());


