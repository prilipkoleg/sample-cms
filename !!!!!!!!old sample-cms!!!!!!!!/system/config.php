<?php
class Config {
    private $config;

    function __construct($config)
    {
        $this->config = $config;
    }

    public function getConfig($res)  // дальше будем использовать так Config->getConfig(db)
    {
        return $this->config[$res];
    }

}