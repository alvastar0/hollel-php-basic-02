<?php

// Чтобы работать с переменными сессии,
// для начала её нужно запустить.
session_start();

// Учетные данные пользователя
const CREDENTIALS = [
    'login' => 'alvastarua',
    'password' => '81dc9bdb52d04dc20036dbd8313ed055' // 1234
];

// Проверяем наличие данных в запросе
if (empty($_POST['login']) || empty($_POST['password'])) {
    // Сообщения об ошибках удобно записывать в сессии.
    // В файле auth-form.php с помощью этой переменной будет
    // выводиться сообщение об ошибке.
    $_SESSION['error'] = 'Все поля обязательны для заполнения!';

    // Перенаправление на страницу auth-form.php
    header('Location: auth-form.php');

    exit;
}

// Очистка данных
$login = trim(htmlspecialchars(strip_tags($_POST['login']), ENT_QUOTES | ENT_HTML5));
$password = md5($_POST['password']);

if ($login === CREDENTIALS['login'] && $password === CREDENTIALS['password']) {
    // Если учетные данные пользователя совпадают с введенными данными,
    // то складываем в сессии данные о том, что пользователь прошел аутентификацию
    $_SESSION['is_auth'] = 1;
    $_SESSION['login'] = $login;

    header('Location: auth-form.php');
} else {
    header('Location: auth-form.php');

    $_SESSION['error'] = 'Ошибка аутентификации!';
}
