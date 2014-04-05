<?php
class Router {

    private $path;

    public function __construct($route, $route_array)
    {
		if(isset($route_array[$route])){
			$this->path = $route_array[$route];
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