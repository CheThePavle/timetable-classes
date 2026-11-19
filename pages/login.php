<?php
    if (isset($_SESSION['id_teacher'])) {
        header('Location: /index');
        exit();
    }

    require_once 'components/header.php';
?>

<div class="login">
    <form action="/handlers/login.php" method="post">
        <p class="heading">Вход</p>
        <input name="login" type="text" maxlength="255"  placeholder="Логин" class="inputline"></br>
        <input name="password" type="password" maxlength="255" placeholder="Пароль" class="inputline"></br>
        <button class="btn btn-primary mainbtn btn1"  id="login-button" type="submit">Войти</button></br>
        <div>
            <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>
        </div>
        <a href="/register" class="logup-link">Еще нет аккаунта? Зарегистрироваться</a>
    </form>
</div>

<?php
    require_once 'components/footer.php';
?>