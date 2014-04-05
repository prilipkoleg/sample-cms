<?php

return [
    'db' => array(
        'host'=> '127.0.0.1',
        'user'=> 'root',
        'pass'=> '',

    ),
    'router' => array(
        '/' => 'home',
        'contact' => 'contact',
        'faq' => 'faq',
        'about' => 'about', //сделаем посложней , будем просто брать строку адрессную и из неё получать что нам пользователь ввел
        //точно не помню как делаеться вместе найдем
        //вот пока не знаю пусть остаеться как есть, я просто с замахом на дальше взял
        // ключ єто наш адресс в строке или ссылке и ему соответсвует наш обработчик 'name'=> 'blog-test',
    ),
    'page' => array(
        'home' => 'home',
        'author' => 'author',
        'authors' => 'authors',
        'category' => 'category',
    ),
    'template' => 'base',
    'blog_pages' => 'blog_pages',
];

 