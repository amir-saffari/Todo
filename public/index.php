<?php

require_once __DIR__ . "/../bootstrap.php";
$path = trim(str_replace("todo/", "", parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH)), "/");

$routes =
    [
        'GET' => [
            "" =>  ['controller' => 'app\controllers\HomeController', 'method' => 'index'],
            "todos/create" => ['controller' => 'app\controllers\TodoController', 'method' => 'create'],
            "users/register" => ['controller' => 'app\controllers\UserController', 'method' => 'register'],
            "users/loginForm" => ['controller' => 'app\controllers\UserController', 'method' => 'loginForm'],

            
        ],

        'POST' => [
            "todos/store" => ['controller' => 'app\controllers\TodoController', 'method' => 'store'],
            "users/store" => ['controller' => 'app\controllers\UserController', 'method' => 'store'],
            "users/login" => ['controller' => 'app\controllers\UserController', 'method' => 'login'],

        ],
    ];

$method = $_SERVER['REQUEST_METHOD'];
foreach ($routes[$method] as $route => $info) 
{
    if (preg_match("#^$route$#", $path , $matches))
    {
        $id = $matches[1] ?? null;
        $controller = new $info['controller'];
    
        if ($method === 'POST')
        {
            $controller->{$info['method']}($_POST , $id);
        } else {
            $controller->{$info['method']}($id);
        }
    }

}


if (!isset($controller))
{
    echo "404 page not found";
}

