<?php

// Поскольку здесь мы будем использовать сессионные переменные
// для вывода сообщения об ошибке, нам нужно подключить возможность
// работать с сессиями.
session_start();

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Аутентификация</title>
</head>
<body>

<?php if (isset($_SESSION['error'])): ?>
    <div style="background-color:red;color:white;">
        <?php
        echo $_SESSION['error'];

        // После вывода сообщения об ошибке, нам больше нет необходимости
        // хранить это сообщение, поэтому мы удаляем его, предполагая, что
        // пользователь прочитал его.
        unset($_SESSION['error']);
        ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['is_auth']) && !$_SESSION['is_auth']): ?>
    <!--
        Эта форма будет отображаться ТОЛЬКО для тех пользователей,
        которые не прошли аутентификацию.
    -->
    <form action="auth-controller.php" method="post">
        <fieldset>
            <p>
                <label for="login">Логин</label>
                <br>
                <input type="text" name="login" id="login">
            </p>
            <p>
                <label for="password">Пароль</label>
                <br>
                <input type="password" name="password" id="password">
            </p>
            <button type="submit">Войти</button>
        </fieldset>
    </form>
<?php else: ?>
    <!--
        Эта форма будет отображаться ТОЛЬКО для тех пользователей,
        которые прошли аутентификацию.
    -->
    <form action="logout-controller.php" method="post">
        <button type="submit">Выйти</button>
    </form>
<?php endif; ?>

</body>
</html>