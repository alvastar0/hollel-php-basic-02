<?php

session_start();

require_once __DIR__ . '/../includes/errors.php';
require_once __DIR__ . '/../includes/database.php';

if (empty($_POST['email'])) {
    set_error_message('Поле <b>E-mail</b> обязательно для заполнения.');
    header('Location: /15/register.php');
    exit;
}

if (empty($_POST['password'])) {
    set_error_message('Поле <b>Пароль</b> обязательно для заполнения.');
    header('Location: /15/register.php');
    exit;
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    set_error_message('Неверный формат e-mail.');

    header('Location: /15/register.php');

    exit;
}

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$name = trim(strip_tags(htmlspecialchars($_POST['name'], ENT_QUOTES | ENT_HTML5))) ?: null;
