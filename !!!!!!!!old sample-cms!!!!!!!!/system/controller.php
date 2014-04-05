<?php
class Controller {

    private $layout;

    function __construct($layout)
    {
        $this->layout = $layout;
    }


    function setAction($action )
    {
        $method = $action . 'Action'; //метод
        if(method_exists($this, $method)) // проверяем есть ли такой метод
        {
			$this->layout->setView($action);
            $this->$method($action); // вызов методов которые мы задали, для существующих страниц
        } 
    }

    private function homeAction(){
        $data = array(
            'title' => 'Главная страница', //ещё немного данных для отображения
            'text' => 'Текст для главной страницы'
        );

        $this->layout->render($data);
    }

    private function contactAction(){
		$data = array(
            'title' => 'Контакты',
            'text' => 'Это страница контактов'
        );
		
		$this->layout->render($data);
    }

    private function aboutAction(){ //пробуем, может сразу не получиться, писал как ты видел по ходу все продумывая
        $data = array(
            'title' => 'Страница о нас',
            'text' => 'Текст страницы о нас'
        );

        $this->layout->render($data);
    }

    private function faqAction(){
        $data = array(
            'title' => 'FAQ',
            'text' => 'Это страница FAQ'
        );

        $this->layout->render($data);
    }

    function notfoundAction(){
        $this->layout->render();
    }

}

class Blog_Controller {

    private $layout;

    function __construct($layout)
    {
        $this->layout = $layout;
    }


    function setAction($action)
    {
        $method = $action . 'Action'; //метод
        if(method_exists($this, $method)) // проверяем есть ли такой метод
        {
			$this->layout->setView($action);
            $this->$method($action); // вызов методов которые мы задали, для существующих страниц
        }
    }

    private function homeAction(){
        $data = array(
            'title' => 'Главная страница', //ещё немного данных для отображения
            'text' => 'Текст для главной страницы'
        );

        $this->layout->render($data);
    }


    private function authorsAction(){
        $connect = mysql_connect('localhost', 'root', '');
        $db_base = 'blog-test';
        mysql_select_db($db_base, $connect);
        $sql = 'SELECT name FROM author';
        $query = mysql_query($sql, $connect);
        $row = mysql_fetch_assoc($query);

        /*if ($query) {
            while($row = mysql_fetch_assoc($query)){
                $array = $row['name'];
            }
        } else {
            $array = 'С запросом что-то не так!';
        }*/



        $data = array(
            'title' => 'Athors',
            'text' => 'Это страница Athors'
        );

        $this->layout->render($data);
     }
    private function categoryAction(){
        $data = array(
            'title' => 'Category',
            'text' => 'Это страница Category',
        );

        $this->layout->render($data);
     }

    function notfoundAction(){
        $this->layout->render();
    }

}