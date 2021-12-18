<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Загрузка файла</title>
</head>
<body>
<!--
    Атрибут enctype="multipart/form-data" обязателен, если нам
    необходимо отправить с помощью формы какие-либо файлы.
-->
<form action="upload-form-controller.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <div>
            <label for="name">Имя</label>
            <br>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="photo">Фотография профиля</label>
            <br>
            <input type="file" name="photo" id="photo">
        </div>
        <button type="submit">Отправить</button>
    </fieldset>
</form>
</body>
</html>
