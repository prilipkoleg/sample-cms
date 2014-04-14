<?php
class App{

    private $layout;
    private $registry;
    private $document;
    private $id;


    function __construct($layout, $registry, $id)
    {
        $this->layout = $layout;
        $this->id = $id;
        $this->registry = $registry;
        $this->document = array(
            'meta_title' => 'SampleCMS - Example site',
            'header_text' => 'SampleCMS',
            'footer_text' => '&copy;SampleCMS, 2013 - ' . date("Y")
        );

    }


    function dispatch($action)
    {
        $method = $action . 'Action'; 
        if(method_exists($this, $method)) 
        {
			$this->layout->setView($action);
            $this->$method($action); 
        } 
    }

    private function homeAction(){
        $page_data = array(
            'title' => 'Главная страница',
            'text' => 'Текст для главной страницы'
        );

        $data = array_merge($this->document, $page_data);

        $this->layout->render($data);
    }

    private function contactAction(){
		$page_data = array(
            'title' => 'Контакты',
            'text' => 'Это страница контактов'
        );

        $data = array_merge($this->document, $page_data);

		$this->layout->render($data);
    }

    private function aboutAction(){
        $page_data = array(
            'title' => 'Страница о нас',
            'text' => 'Текст страницы о нас'
        );

        $data = array_merge($this->document, $page_data);

        $this->layout->render($data);
    }

    private function blogAction(){
        $page_data = array(
            'title' => 'Blog',
            'text' => 'Это страница Блога'
        );



        $data = array_merge($this->document, $page_data);

        $this->layout->render($data);
    }

    private function authorsAction(){
        $this->registry->get('load')->model('author');

        $page_data = array(
            'title' => 'Authors',
            'bd' => 'Результат с базы данных:',
            'text' => 'Это страница авторов',
            'authors' => $this->registry->get('model_author')->getAuthors()
        );


        $data = array_merge($this->document, $page_data);

        $this->layout->render($data);
    }

    private function authorAction(){
        $this->registry->get('load')->model('author');
        $page_data = array(
            'title' => 'Автор',
            'bd' => 'Результат с базы данных:',
            'text' => 'Это страница Автора',
            'articles' => $this->registry->get('model_author')->getAuthor($this->id)
        );

        $data = array_merge($this->document, $page_data);

        $this->layout->render($data);
        
    }

    private function categoriesAction(){
        $this->registry->get('load')->model('categories');
        $page_data = array(
            'title' => 'Категории',
            'bd' => 'Результат с базы данных:',
            'text' => 'Это страница Категорий',
            'categories' => $this->registry->get('model_categories')->getCategories()
        );

        $data = array_merge($this->document, $page_data);

        $this->layout->render($data);
    }

    private function categoryAction(){
        $this->registry->get('load')->model('categories');
        $page_data = array(
            'title' => 'Категория',
            'bd' => 'Результат с базы данных:',
            'text' => 'Это страница Категории',
            'articles' => $this->registry->get('model_categories')->getCategory($this->id)
        );

        $data = array_merge($this->document, $page_data);

        $this->layout->render($data);
    }

    function notfoundAction(){
        $this->layout->render($this->document);
    }

}