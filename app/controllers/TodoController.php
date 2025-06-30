<?php

namespace app\controllers;

use app\models\Todo;
use app\views\Viewer;

class TodoController
{
    public $model;
    public function __construct() 
    {
        $this->model = new Todo();
    }

    public function index()
    {
        $todos = $this->model->getTodos();
        $viewer = new Viewer();
        $viewer->render("todos/index.php" , ['todos' => $todos]);

    }
    public function create()
    {
        $viewer = new Viewer();
        $viewer->render("todos/create.php");
    }

    public function store($data)
    {

        
        $errors = [];
        $text = trim($data['text']);
        
        if (empty($text)) 
        {
            $errors += ['text' => 'text is required'];
        }

        if (empty($errors))
        {
            $this->model->createTodo($text , $_SESSION['user_id']) ;
            redirect("/todos/index");       
        } else {
            
           redirect("/todos/create" , ['form_errors' => $errors]);
        }
    }

    public function edit($id)
    {
        $todo = $this->model->getTodosById($id);
        $viewer = new Viewer();
        $viewer->render("todos/edit.php" , ['todo' => $todo]);

    }

    public function update($data , $id) 
    {
        $errors = [];
        $text = trim($data['text']);
        
        if (empty($text)) 
        {
            $errors += ['text' => 'text is required'];
        }

        if (empty($errors))
        {
            $this->model->updateTodo($text , $id) ;
            redirect("/todos/index");       
        } else {
            
           redirect("/" , ['form_errors' => $errors]);
        }
    
    }

    public function delete($data , $id)
    {

        $this->model->deleteTodo($id) ;
        redirect("/todos/index");       

    }
        
    
}