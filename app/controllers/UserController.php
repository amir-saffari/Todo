<?php

namespace app\controllers;

use app\models\User;
use app\views\Viewer;

class UserController
{
    public $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function register()
    {
        $viewer = new Viewer();
        $viewer->render("users/register.php");
    }

    public function loginForm()
    {
        $viewer = new Viewer();
        $viewer->render("users/loginForm.php");
    }

    public function store($data)
    {
        $name = trim($data['name']);
        $username = trim($data['username']);
        $password = trim($data['password']);
        $confirm_password = trim($data['confirm_password']);

        $errors = [];
        if (empty($name))
        {
            $errors += ['name' => "name is required"];
        }

        if (empty($username))
        {
            $errors += ['username' => "username is required"];
        }

        if (empty($password))
        {
             $errors += ['password' => "password is required"];
        } elseif (strlen($password) < 8) {
            $errors += ['password' => 'Password must be more than 6 characters'];
        }

        if (empty($confirm_password)) {
            $errors += ['confirm_password' => 'Confirm Password is required'];
        } elseif ($password != $confirm_password) {
            $errors += ['confirm_password' => 'confirm password does not match'];
        }

        if (empty($errors))
        {
            if ($this->model->existsByUsername($username))
            {
                $errors += ['username' => "username already exists"];
                redirect("/users/register" , ['form_errors' => $errors]);
            }

            $hashPassword = password_hash($password , PASSWORD_DEFAULT);
            $this->model->createUser($name , $username , $hashPassword);
            redirect("/");
    
        } else {
            redirect("/users/register" , ['form_errors' => $errors]);
        }
    }

    public function login($data)
    {
       
        $username = trim($data['username']);
        $password = trim($data['password']);
        $errors = [];
        if (empty($username))
        {
            $errors += ['username' => "username is required"];
        }

        if (empty($password))
        {
             $errors += ['password' => "password is required"];
       
        }
        $user = $this->model->existsByUsername($data['username']);

        if ($user && password_verify($password , $user->password))
        {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_username'] = $user->username;
            redirect("/");
        } else {
            $errors += ['error' => "password or username invalid"];
            redirect("/users/loginForm" , ['form_errors' => $errors]);
        }
    }
}