<?php

    class Database{
        private $servername = 'localhost';
        private $db_username = 'root';
        private $db_password = '';
        private $database = 'portfolio';
        public $conn;


        public function __construct()
        {
            $this->conn = new mysqli($this->servername,$this->db_username,$this->db_password,$this->database);

            if($this->conn->connect_error){
                die('Connection Error'.$this->conn->connect_error);
            }

            return $this->conn;
        }


    }

?>