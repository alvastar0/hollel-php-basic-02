<?php

session_start();

require_once __DIR__ . '/includes/errors.php';
require_once __DIR__ . '/includes/database.php';

$title = 'Главная';

require __DIR__ . '/templates/header.php';

?>

<?php
if (!empty($_SESSION['is_auth']) && !empty($_SESSION['user_id'])):
    $database = database_connect();

    $statement = $database->prepare('SELECT * FROM `users` WHERE `id` = :id');
    $statement->execute(['id' => $_SESSION['user_id']]);

    $user = $statement->fetch();

    if (is_array($user)):
        echo 'Привет, ' . $user['email'] . '!';
    endif;
endif;
?>

<?php require __DIR__ . '/templates/footer.php'; ?>