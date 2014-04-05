<?php
class Layout {

    private $template;
    private $view;

    function __construct($template)
    {
        $this->template = $template;
    }

    public function setView($view)
    {
        $this->view = $view;
    }

    public function render($data = array()) {

        $header = file_get_contents('../views/' . $this->template . '/header.tpl');
        $menu = file_get_contents('../views/' . $this->template . '/menu.tpl');
        $view = file_get_contents('../views/' . $this->template . '/pages/' . $this->view . '.tpl');
        $footer = file_get_contents('../views/' . $this->template . '/footer.tpl');
		
        
		$layout = file_get_contents('../views/' . $this->template . '/main.tpl');
        
		foreach($data as $key=>$val){
            $view = str_replace('{' . $key . '}', $val , $view);
        }
		
		$view_placeholders = array(
			'{header}',
			'{menu}',
            '{db}',
			'{content}',
			'{footer}'
		);
		
		$view_data = array(
			$header,
			$menu,
			$view,
			$footer
		);

        $output = str_replace($view_placeholders, $view_data , $layout);

        echo $output;

    }
    //тут нужно будет найти готовый код для обфускации шаблона, думаю в опенкарте найдем, пока просто вывод попробую сделать
}


class Blog_Layout {

    private $template;
    private $view;

    function __construct($template)
    {
        $this->template = $template;
    }

    public function setView($view)
    {
        $this->view = $view;
    }

    public function render($data = array()) {

        $header = file_get_contents('../views/' . $this->template . '/header.tpl');
        $menu = file_get_contents('../views/' . $this->template . '/blog_menu.tpl');
        $view = file_get_contents('../views/' . $this->template . '/blog_pages/' . $this->view . '.tpl');
        $footer = file_get_contents('../views/' . $this->template . '/footer.tpl');
		$layout = file_get_contents('../views/' . $this->template . '/main.tpl');

		foreach($data as $key=>$val){
            $view = str_replace('{' . $key . '}', $val , $view);
        }

		$view_placeholders = array(
			'{header}',
			'{menu}',
			'{content}',  //сюда хотел добавить еще составляющую и выводить запрос file_get_contents с файла
			'{footer}'      //сложно, наверное ты не понял что я хотел
		);

		$view_data = array(
			$header,
			$menu,
			$view,
			$footer
		);

        $output = str_replace($view_placeholders, $view_data , $layout);

        echo $output;

    }
    //тут нужно будет найти готовый код для обфускации шаблона,
    //думаю в опенкарте найдем, пока просто вывод попробую сделать
}