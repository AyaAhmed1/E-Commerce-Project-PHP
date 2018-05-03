<?php

class category extends BaseEntity{
    
    public $id;
    public $name;
    public $conn;

    public function __construct($conn,$cat_array) {
        
        $this->id=$cat_array['id'];
        $this->name=$cat_array['name'];
        $this->conn=$conn
       
        ;
    }
    }
    
    ?>