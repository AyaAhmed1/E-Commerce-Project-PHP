<?php
class product extends BaseEntity {
    public $id;
    public $name;
    public $price;
    public $description;
    public $photo;
    public $created_at;
    public $conn;
    public $categoryid;

    public function __construct($conn, $productArray=false) {
        $this->conn = $conn;
        $this->id = $productArray['id'];
        $this->name = $productArray['name'];
        $this->price = $productArray['price'];
        $this->description = $productArray['description'];
        $this->photo = $productArray['photo'];
        $this->categoryid = $productArray['category_id'];
        $this->created_at = $productArray['created_at'];
    }
    public function save()
    {
        $time = date("Y-m-d H:i:s");
        $query = "INSERT INTO `products` (`id`, `name`, `photo`, `price`, `category_id`, `description`) "
                . "VALUES (NULL, '{$this->getName()}', '{$this->getPhoto()}', '{$this->getPrice()}', '{$this->getCategoryid()}', '{$this->getDescription()}');";

        mysqli_query($this->conn, $query) or die(mysqli_error($this->conn));
        $this->id = mysqli_insert_id($this->conn);
        return $this->id;
    }
    public function update()
    {
        $query = "UPDATE `products` SET `name`='{$this->getName()}',`description`='{$this->getDescription()}',`photo`='{$this->getPhoto()}',`category_id`={$this->getCategoryid()},`price`={$this->getPrice()} WHERE id= {$this->id}";
        mysqli_query($this->conn, $query) or die(mysqli_error($this->conn));
    }
    
    public function delete() {
        $query = "DELETE FROM product WHERE id = {$this->id}";
        mysqli_query($this->conn, $query) or die(mysqli_error($this->conn));
    }
    
}
?>
