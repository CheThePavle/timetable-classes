<?php
    require_once '../src/functions.php';

    $surname = validate($_POST['surname']);
    $name = validate($_POST['name']);
    $patronymic = validate($_POST['patronymic']);
    $login = validate($_POST['login']);
    $password = validate($_POST['password']);

//    echo '<pre>';
//    print_r($_POST);
//    echo '</pre>';

    $checkLogin = query("SELECT id_teacher FROM teachers WHERE login = ?", [$login]);
    if (count($checkLogin) > 0) {
        $_SESSION['msg'] = 'Такой логин занят';
        header('Location: /register');
    } else {
        make("INSERT INTO `teachers` (`surname`, `name`, `patronymic`, `login`, `password`) VALUES (?, ?, ?, ?, ?)",
            [$surname, $name, $patronymic, $login, password_hash($password, PASSWORD_DEFAULT)]);

        $_SESSION['msg'] = 'Успешная регистрация';
        header('Location: /login');
    }
