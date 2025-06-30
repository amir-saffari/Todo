<?php

namespace app\controllers;

use app\models\Todo;

class homeController
{
    public $model;
    public function __construct() 
    {
        $this->model = new Todo();
    }

    public function index()
    {
        $todos = $this->model->getTodos();
        print_r($todos);
    }
}