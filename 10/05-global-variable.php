<?php

/*
 * Данный пример демонстрирует использование глобальных переменных.
 */

$email = 'alvastarua@gmail.com';

function print_email_link()
{
    // Будет предпринята попытка найти переменную с таким именем в глобальной
    // области видимости. Если это получится, то работа будет производиться с
    // "оригинальной" переменной; в противном случае будет создана переменная
    // со значением "NULL".
    global $email;

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    echo '<a href="mailto:' . $email . '">' . $email . '</a>';
}

print_email_link();

// Проблемы глобальных переменных в том, что их значения можно изменить в любом
// месте программы, и заменить на любые другие значения (даже некорректные).
$email = new stdClass();
$email->address = 'alvastarua@gmail.com';

print_email_link(); // Некорректная работа функции, но ошибки нет!
