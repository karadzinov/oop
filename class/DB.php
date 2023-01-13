<?php


class DB {

    protected $hostname;
    protected $db_name;
    protected $db_pass;
    protected $username;

   public function __construct()
   {
       $this->db_name = "firstdb";
       $this->db_pass = "secret";
       $this->hostname = "localhost";
       $this->username = "homestead";

   }

   public function connect()
   {
       // Create connection
       $conn = new mysqli($this->hostname, $this->username, $this->db_pass);

        // Check connection
       if ($conn->connect_error) {
           return $conn->connect_error;
       }
       return $conn;
   }


}