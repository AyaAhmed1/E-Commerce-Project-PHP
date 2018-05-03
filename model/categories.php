<?php

class categories extends BaseEntity
{
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
 
     public function getCategories()
    {
    
          $query = "SELECT * FROM  category  ORDER BY id";
          $result = $this->conn->query($query);
        $output = array();
        if($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $output[] = new category($this->conn, $row);
            }
        }
        return $output;
    
}
}
?>