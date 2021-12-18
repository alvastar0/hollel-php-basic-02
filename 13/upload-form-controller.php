<?php

// Проверка наличия изображения
if (!isset($_FILES['photo'])) {
    header('Location: upload-file-form.php');

    exit;
}

// Проверка ошибки загружки файла
if ((int)$_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
    header('Location: upload-file-form.php');

    exit;
}

// Генерация имени файла и полного пути к нему.
// Обратите внимание на использование функции uniqid().
// Это сделано для того, чтобы предотвратить перезапись файлов с одинаковыми именами.
$uploadedFileName = uniqid('', true) . stripslashes(strip_tags(trim($_FILES['photo']['name'])));
$uploadedFilePath = __DIR__ . '/uploads/' . basename($uploadedFileName);
$uploadedFileDir = dirname($uploadedFilePath);

// Проверка и создание директории для хранения файлов
if (!is_dir($uploadedFileDir)) {
    mkdir($uploadedFileDir, 0755, true);
}

move_uploaded_file($_FILES['photo']['tmp_name'], $uploadedFilePath);
