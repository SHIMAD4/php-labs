<head>
    <link rel="stylesheet" href="style.css">
</head>

<?php

    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(E_ALL);

    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $pass  = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

    $mysql = new mysqli('localhost', 'root', '', 'users');

    // Проверка логина и пароля на совпадение
    $result = $mysql -> query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$pass'");

    // Форматирование объекта в привычный массив
    $user = $result -> fetch_assoc();

    // Проверка на существование пользователя
    if(count($user) == 0) {
        echo '<div class="error">
                <p class="error__text">Такой пользователь не найден.</p>
                <a class="try-again" href="./index.php">Повторить попытку</a>
              </div>';
        exit();
    }

    // Устанавливаем куки
    setcookie('user', $user['full_name'], time() + 3600, '/');
    setcookie('id', $user['id'], time() + 3600, '/');

    // Закрываем БД
    $mysql -> close();

    // Переадресация
    header('Location: /course-work/');
?>