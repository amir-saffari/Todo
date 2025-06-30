<?php

namespace app\controllers;

use app\models\Todo;
use app\views\Viewer;

class TodoController extends AuthController
{
    public $model;
    public function __construct() 
    {
        $this->model = new Todo();
    }

    public function index()
    {
        $this->authorize();

        $todos = $this->model->getTodos();
        $viewer = new Viewer();
        $viewer->render("todos/index.php" , ['todos' => $todos]);

    }
    public function create()
    {
        $this->authorize();

        $viewer = new Viewer();
        $viewer->render("todos/create.php");
    }

    public function store($data)
    {

        $this->authorize();
        
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
        $this->authorize();

        $todo = $this->model->getTodosById($id);
        $viewer = new Viewer();
        $viewer->render("todos/edit.php" , ['todo' => $todo]);

    }

    public function update($data , $id) 
    {
        $this->authorize();

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
        $this->authorize();

        $this->model->deleteTodo($id) ;
        redirect("/todos/index");       

    }
        
    
}