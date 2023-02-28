<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP lab_2</title>
    <link rel="stylesheet" href="../src/main.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <img src="img/logo.svg" alt="logo" width="200">
            <h2 class="header__title">Лабораторная работа №2</h2>
        </header>
        <main>
            <textarea name="headers" id="output" cols="45" rows="13">
                <?php
                    $url = "https://httpbin.org/post";
                    print_r(get_headers($url, true));
                ?>
            </textarea>
            <a class="btn prev__btn" href="./index.php">Страница №1</a>
        </main>
        <footer>
            <h2 class="footer__title">Старцев Виталий Витальевич 221-322</h2>
        </footer>
    </div>
</body>
</html>