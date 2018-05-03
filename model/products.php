<?php

class products extends BaseEntity {

    public $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function filter($cat_id) {
        $query = "SELECT * FROM products where category_id=$cat_id ORDER BY id";
        $result = $this->conn->query($query);
        $output = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $output[] = new product($this->conn, $row);
            }
        }
        return $output;
    }

    public function getAll() {
        $query = "SELECT * FROM products ORDER BY id";
        $result = $this->conn->query($query);
        $output = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $output[] = new product($this->conn, $row);
            }
        }
        return $output;
    }

      public function search($keyword)
    {
        $query = "SELECT * FROM products WHERE name LIKE '%{$keyword}%' OR description LIKE '%{$keyword}%'";
        $result = $this->conn->query($query);
        $output = array();
        if($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $output[] = new product($this->conn, $row);
            }
        }
        return $output;
    }
    
        public function getProduct($id) {
        $query = "SELECT * FROM products where id=".$id ;
        $result = $this->conn->query($query);
        $output = array();
        if($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
        }
        return $row;
    }

    
    
}

?>