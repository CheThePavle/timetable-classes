<?php
    require_once '../src/functions.php';

    $login = validate($_POST['login']);
    $password = validate($_POST['password']);

    $teacher = query("SELECT * FROM teachers WHERE login = ?", [$login]);

    if (count($teacher) > 0) {
        if (password_verify($password, $teacher[0]['password'])) {
            $_SESSION['id_teacher'] = $teacher[0]['id_teacher'];
            $_SESSION['name'] = $teacher[0]['name'];
            header('Location: /');
        } else {
            $_SESSION['msg'] = 'Неверный пароль';
            header('Location: /login');
        }
    } else {
        $_SESSION['msg'] = 'Неверный логин';
        header('Location: /login');
    }
