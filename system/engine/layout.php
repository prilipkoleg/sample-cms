<?php
class Layout {

    private $them;
    private $template_dir;
    private $view;

    function __construct($template = array())
    {
        $this->template_dir = $template['dir'];
        $this->them = $template['them'];
    }

    public function setView($view)
    {
        $this->view = $view;
    }

    public function renderView($view, $data = array()) {
        $file = $view;

        if (file_exists($file)) {
            extract($data);

            ob_start();

            require($file);

            $output = ob_get_contents();

            ob_end_clean();

            return $output;
        } else {
            trigger_error('Error: Could not load template ' . $file . '!');
            exit();
        }
    }

    public function render($data = array()) {

        $header = $this->renderView('../views/' . $this->them . '/header.tpl', $data);
        $menu = $this->renderView('../views/' . $this->them . '/menu.tpl', $data);
        $content = $this->renderView('../views/' . $this->them . '/pages/' . $this->view . '.tpl', $data);
        $footer = $this->renderView('../views/' . $this->them . '/footer.tpl', $data);

		$layout = file_get_contents('../views/' . $this->them . '/main.tpl');
        
		$view_placeholders = array(
			'{header}',
			'{menu}',
			'{content}',
			'{footer}'
		);

		$view_data = array(
			$header,
			$menu,
            $content,
			$footer
		);

        $output = str_replace($view_placeholders, $view_data , $layout);

        echo $output;

    }


} 
