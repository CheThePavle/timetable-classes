<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link href="/public/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/public/assets/css/style.css" rel="stylesheet" />
    <link href="/public/assets/css/media.css" rel="stylesheet" />
    <script src="/public/assets/js/bootstrap.bundle.min.js"></script>
    
</head>

<body>
<div class="container">
    <div class="header-nav">
        <!-- меню навигации -->
        <a class="logo" href="/index"><img src="/public/assets/img/logo.png"></a>

        <nav id="nav" class="nav">
            <ul class="nav-list">
                <li class="nav-item"><a href="/index" class="nav-link">Главная</a></li>
                <li class="nav-item"><a href="/table_students" class="nav-link">Расписание</a></li>
                <li class="nav-item"><a href="/login" class="nav-link">Для преподавателей</a></li>
                <?php
                    if (isset($_SESSION['id_teacher'])) {
                        echo "<li class='nav-item'><a href='/handlers/logout.php' class='nav-link'>Выход</a></li>";
                    }
                ?>
            </ul>
            <button id="nav-btn" class="nav-button">
                <img id="nav-btn-img" src="/public/assets/img/NAV.svg">
            </button>
        </nav>
    </div>
    

