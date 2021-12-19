<?php

session_start();

require_once __DIR__ . '/../includes/errors.php';

if (empty($_POST['email']) || empty($_POST['password'])) {
    set_error_message('Все поля обязательные для заполнения.');

    header('Location: /15/login.php');

    exit;
}
