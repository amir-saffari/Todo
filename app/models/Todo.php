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

    public function createTodo($text)
    {
        $stmt = $this->db->conn->prepare("INSERT INTO todos (text) VALUES (:text)");
        $stmt->execute(['text' => $text]);
    }

    public function updateTodo($id , $text)
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