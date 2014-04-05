<?php

    class DataBase {
        private $db_host;
        private $db_user;
        private $db_pass;

        public function __construct($arr) {
            $this->db_host = $arr['host'];
            $this->db_user = $arr['user'];
            $this->db_pass = $arr['pass'];
        }

        public function db_connect() {

            return mysql_connect($this->db_host, $this->db_user, $this->db_pass);
        }
    }

