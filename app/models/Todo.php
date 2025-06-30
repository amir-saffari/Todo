<?php

namespace app\models;

use Database;
use PDO;

class Todo
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getTodos()
    {
        $stmt = $this->db->conn->query("SELECT * FROM todos");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getTodosById($id)
    {
        $stmt = $this->db->conn->prepare("SELECT * FROM todos WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function createTodo($text , $user_id)
    {
       
        $stmt = $this->db->conn->prepare("INSERT INTO todos (text , user_id) VALUES (:text , :user_id)");
        $stmt->execute(['text' => $text , 'user_id' => $user_id]);
            
    }

    public function updateTodo($text , $id)
    {
         $stmt = $this->db->conn->prepare("UPDATE todos SET text = :text WHERE id = :id");
         $stmt->execute(['text' => $text , 'id' => $id]);
         return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function deleteTodo($id)
    {
        $stmt = $this->db->conn->prepare("DELETE FROM todos WHERE id = :id");
         $stmt->execute(['id' => $id]);
    }
}