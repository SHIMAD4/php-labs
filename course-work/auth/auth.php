<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Work</title>
    <link rel="stylesheet" href="./style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex justify-center items-center h-screen">
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
            echo '<div class="flex flex-col justify-center items-center">
                    <p class="text-red-600 text-[25px] font-[bold] text-center">Такой пользователь не найден.</p>
                    <a class="text-red-300 hover:text-red-600 active:text-red-800 text-[25px] font-[bold] text-center text-[green]" href="../index.php">Повторить попытку</a>
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
</body>
</html>