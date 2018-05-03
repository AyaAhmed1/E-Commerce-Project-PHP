<?php

$conn;

class User extends BaseEntity {

    public $id;
    public $username;
    public $photo;
    public $name;
    public $email;
    public $phone;
    public $password;
    public $conn;
    public $key;

    public function __construct($conn, $userId = false) {
        $this->conn = $conn;
        if ($userId) {
            $query = "SELECT * FROM user WHERE id={$userId}";
            $result = $this->conn->query($query);
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                foreach ($row as $key => $value) {
                    $this->$key = $value;
                }
               
            } else {
                die('User Not Found');
            }
        }
    }

    /**
     * save for new user to database
     */
    public function save()
    {
        $time = date("Y-m-d H:i:s");
        $query = "INSERT INTO `user` (`id`, `name`, `username`, `photo`, `email`, `password`, `phone`) "
                . "VALUES (NULL, '{$this->getName()}', '{$this->getUsername()}', '{$this->getPhoto()}', '{$this->getEmail()}', '{$this->getPassword()}', '{$this->getPhone()}');";

        mysqli_query($this->conn, $query) or die(mysqli_error($this->conn));
        $this->id = mysqli_insert_id($this->conn);
        return $this->id;
    }

    public function update() {
        $query = "UPDATE `user` SET `phone` = '{$this->getPhone()}',`email` = '{$this->getEmail()}',`username` = '{$this->getUsername()}',`name` = '{$this->getName()}',`photo` = '{$this->getPhoto()}' WHERE `user`.`id` = {$this->id}";
        mysqli_query($this->conn, $query) or die(mysqli_error($this->conn));
    }
/*
    public function delete() {
        $query = "DELETE FROM `user` WHERE `user`.`id` = {$this->id}";
        mysqli_query($this->conn, $query) or die(mysqli_error($this->conn));
    }*/

}
