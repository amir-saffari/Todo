<?php

require_once __DIR__ . "/../bootstrap.php";
$path = trim(str_replace("todo/", "", parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH)), "/");

$routes =
    [
        'GET' => [
            "" =>  ['controller' => 'app\controllers\HomeController', 'method' => 'index'],
            "todos/index" => ['controller' => 'app\controllers\TodoController', 'method' => 'index'],
            "todos/create" => ['controller' => 'app\controllers\TodoController', 'method' => 'create'],
            "todos/edit/([0-9]+)" => ['controller' => 'app\controllers\TodoController', 'method' => 'edit'],
            "todos/update/([0-9]+)" => ['controller' => 'app\controllers\TodoController', 'method' => 'update'],
            "users/register" => ['controller' => 'app\controllers\UserController', 'method' => 'register'],
            "users/loginForm" => ['controller' => 'app\controllers\UserController', 'method' => 'loginForm'],
            "users/profileForm" => ['controller' => 'app\controllers\UserController', 'method' => 'profileForm'],
            "users/logout" => ['controller' => 'app\controllers\UserController', 'method' => 'logout'],
            
        ],

        'POST' => [
            "todos/store" => ['controller' => 'app\controllers\TodoController', 'method' => 'store'],
            "users/store" => ['controller' => 'app\controllers\UserController', 'method' => 'store'],
            "users/login" => ['controller' => 'app\controllers\UserController', 'method' => 'login'],
            "todos/update/([0-9]+)" => ['controller' => 'app\controllers\TodoController', 'method' => 'update'],
            "todos/delete/([0-9]+)" => ['controller' => 'app\controllers\TodoController', 'method' => 'delete'],
            "users/updateProfile" => ['controller' => 'app\controllers\UserController', 'method' => 'updateProfile'],
        ],
    ];

$method = $_SERVER['REQUEST_METHOD'];
foreach ($routes[$method] as $route => $info) {
    if (preg_match("#^$route$#", $path, $matches)) {
        $id = $matches[1] ?? null;
        $controller = new $info['controller'];

        if ($method === 'POST') {
            $controller->{$info['method']}($_POST, $id);
        } else {
            $controller->{$info['method']}($id);
        }
    }
}


if (!isset($controller)) {
    echo "404 page not found";
}
