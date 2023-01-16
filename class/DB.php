<?php


class DB {

    protected $hostname;
    protected $db_name;
    protected $db_pass;
    protected $username;
    protected $table;
    protected $conn;

   public function __construct($table)
   {
       $this->db_name = "firstdb";
       $this->db_pass = "secret";
       $this->hostname = "localhost";
       $this->username = "homestead";
       $this->table = $table;
       $this->conn = $this->connect();

   }

   public function connect()
   {
       // Create connection
       $conn = new mysqli($this->hostname, $this->username, $this->db_pass, $this->db_name);

        // Check connection
       if ($conn->connect_error) {
           return $conn->connect_error;
       }
       return $conn;
   }


    public function insert($data)
    {
        $keys = [];
        $values = [];
        foreach ($data as $key => $value) {
            $keys[] = $key;
            $values[] = "'$value'";
        }

        $keys = implode(',', $keys);
        $values = implode(',', $values);

        $queryInsert = "INSERT INTO $this->table ($keys) VALUES ($values)";


        $this->conn->query($queryInsert);

        return $this->conn->insert_id;

    }

    public function getAll()
    {

        $querySelect = "SELECT * FROM $this->table";


        $result = $this->conn->query($querySelect);

        $results = [];

        while ($row = $result->fetch_object()) {
            $results[] = $row;
        }

        return $results;
    }

    public function get($id)
    {
        $querySelect = "SELECT * FROM $this->table WHERE id=$id";

        $result = $this->conn->query($querySelect);

        return $result->fetch_object();

    }


    public function update($id, $data)
    {

        $buildQuery = [];

        foreach ($data as $key => $value) {
            $buildQuery[] = "$key = '$value'";
        }

        $buildQuery = implode(',', $buildQuery);

        $queryExecute = "UPDATE $this->table SET $buildQuery WHERE id = '$id'";

        $result = $this->conn->query($queryExecute);

        return $result;

    }

    public function remove($id)
    {
        $querySelect = "DELETE FROM $this->table WHERE id=$id";
        $result = $this->conn->query($querySelect);
        return $result;
    }





}