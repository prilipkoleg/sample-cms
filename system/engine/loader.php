<?php
class Loader {
    protected $registry;

    function __construct($registry)
    {
        $this->registry = $registry;
    }

    public function model($model) {
        $file  = '../' . 'model/' . $model . '.php';
        $class = 'Model' . preg_replace('/[^a-zA-Z0-9]/', '', $model); //ModelAuthor



        if (file_exists($file)) {
            include_once($file);

            $this->registry->set('model_' . str_replace('/', '_', $model), new $class($this->registry));
        } else {
            trigger_error('Error: Could not load model ' . $model . '!');
            exit();
        }
    }


} 