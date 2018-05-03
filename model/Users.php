<?php

class Users extends BaseEntity {

    public $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }
    public function filter($keyword) {
        $query = "SELECT * FROM user WHERE name LIKE '%{$keyword}%' OR email LIKE '%{$keyword}%' OR username LIKE '%{$keyword}%'";
        $result = $this->conn->query($query);
       
    }

    public function checkUser($name,$pass){
        $query = "SELECT * FROM `user` WHERE username= '$name' and password = $pass";
        $result = $this->conn->query($query);
         $output = array();
       
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $output[] = new User($this->conn, $row['id']);
            }
        }
        return $output;
        
    }
     public function allUsers($keyword)
    {
        $query = "SELECT * FROM user ";
        $result = $this->conn->query($query);
        $output = array();
        if($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $output[] = new User($this->conn, $row['id']);
            }
        }
        return $output;
    }

}
