<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход в систему</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
<?php        include 'php/header.php';    ?>
<div class="main__login">
    <div class="signin__text">Авторизация</div>
    <form action="php/login.php" method="post">
        <input type="login" id="login" name="login">
        <input type="password" id="password" name="password">
        <button type="submit">Отправить</button>
    </form>
</div>
<?php        include 'php/footer.php';    ?>
</body>
</html>