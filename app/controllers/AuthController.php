<?php

namespace app\controllers;

class AuthController
{
    public function authorize()
    {
        if (!isLoggedin())
        {
            redirect('/users/loginForm');
        }
    }
}