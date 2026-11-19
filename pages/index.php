<?php
    require_once 'components/header.php';
?>

<div class="main">
    <div class="links">
        <p class="heading head-margin">Расписание для студентов и преподавателей</p>
        <a class="btn btn-primary mainbtn btn1" href="/table_students" role="button">Я студент</a><br>
        <a class="btn btn-primary mainbtn" href="/login" role="button">Я преподаватель</a>
    </div>
    <div><img class="img-main" src="/public/assets/img/main.png"></div>
</div>

<?php
    require_once 'components/footer.php';
?>