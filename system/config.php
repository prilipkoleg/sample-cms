<?php
class Config {
    private $config;

    function __construct($config)
    {
        $this->config = $config;
    }

    public function get($res)
    {
        return $this->config[$res];
    }
}