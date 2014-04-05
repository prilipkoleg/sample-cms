<?php
class Router {

    private $path;

    public function __construct($page, $route_array)
    {
		if(isset($route_array[$page])){
			$this->path = $route_array[$page];
		} else {
			$this->path = 'notfound';
		}
        
        //echo 'наш путь - ' . $this->path;
    }

    public function getPath()
    {
        return $this->path; //возвращает путь
    }

}