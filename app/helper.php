<?php

function redirect($page, $session = [])
{
    $_SESSION[key($session)] = $session[key($session)];

    header("Location:" . URL_ROOT . $page);
    exit;
}

function isLoggedin()
{
    return isset($_SESSION['user_id']);
}


