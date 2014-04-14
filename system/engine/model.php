<?php

abstract class Model { 
    protected $registry;

    function __construct($registry) 
    {
        $this->registry = $registry;
    }

    function __set($name, $value) 
    {
        $this->registry->set($name, $value);
    }

    function __get($name) 
    {
        return $this->registry->get($name); 
       
    }


}