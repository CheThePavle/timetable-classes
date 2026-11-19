<?php
    $url = (isset($_GET['q'])) ? $_GET['q'] : '';
    $url = rtrim($url, '/');
    $urls = explode('/', $url);


    if ($urls[0] === 'index' && count($urls) == 1){
        require_once 'pages/index.php'; // Главная страница
         exit();
    }

    if ($urls[0] === 'login' && count($urls) == 1){
        require_once 'pages/login.php';
        exit();
    }
    if ($urls[0] === 'register' && count($urls) == 1){
        require_once 'pages/register.php';
        exit();
    }
    if ($urls[0] === 'table_students' && count($urls) == 1){
        require_once 'pages/table_students.php';
        exit();
    }
    if ($urls[0] === 'table_methodist' && count($urls) == 1){
        require_once 'pages/table_methodist.php';
        exit();
    }



    // if ($urls[0] === 'login' && sizeof($urls) == 1){
    //     require_once 'pages/login.php'; // Авторизация страница
    //     exit();
    // }

    //...роуты

    // http_response_code(404);
    // include_once 'pages/404.php'; // 404 страница
