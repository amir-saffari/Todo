<?php

namespace app\models;

use Database;
use PDO;

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getUsers()
    {
        $stmt = $this->db->conn->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function existsByUsername($username)
    {
        $stmt = $this->db->conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public function existsById($id)
    {
        $stmt = $this->db->conn->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    
    public function createUser($name , $username , $password)
    {
        $stmt = $this->db->conn->prepare("INSERT INTO users (name , username , password) VALUES (:name , :username , :password)");
        $stmt->execute(['name' => $name , 'username' => $username , 'password' => $password]);
    }

    public function updateUser($id , $name , $username , $password) 
    {
        $stmt = $this->db->conn->prepare("UPDATE users SET name = :name , username = :username , password = :password WHERE id = :id ");
        $stmt->execute([ 'id' => $id ,'name' => $name , 'username' => $username , 'password' => $password]);
    }
}
