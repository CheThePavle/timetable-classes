<?php
    if (isset($_SESSION['id_teacher'])) {
        header('Location: /index');
        exit();
    }

    require_once 'components/header.php';
?>

<div class="login">
    <p class="heading">Регистрация</p>
    <form action="/handlers/register.php" method="post">
        <input name="surname" type="text" maxlength="255" placeholder="Фамилия*" class="inputline" required></br>
        <input name="name" type="text" maxlength="255" placeholder="Имя*" class="inputline" required></br>
        <input name="patronymic" type="text" maxlength="255" placeholder="Отчество*" class="inputline" required></br>
        <input name="login" type="text" maxlength="255" placeholder="Логин*" class="inputline" required></br>
        <input name="password" type="password" maxlength="255" placeholder="Пароль*" class="inputline" required></br>
        <button class="btn btn-primary mainbtn btn1" id="logup-button" type="submit">Зарегистрироваться</button></br>
        <div>
            <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>
        </div>
        <a href="/login" class="logup-link">Уже есть аккаунт? Войти</a>
    </form>
</div>

<?php
    require_once 'components/footer.php';
?>