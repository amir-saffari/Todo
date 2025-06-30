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
            $this->model->createTodo($text);       
        } else {
            
           redirect("/todos/create" , ['form_errors' => $errors]);
        }
    }

    public function show()
    {
        $this->model->getTodos();
    }
        
    
}