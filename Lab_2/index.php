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
            <form action="https://httpbin.org/post" method="POST">
                <fieldset>
                    <legend>Feedback Form</legend>
                    <label for="name">Имя пользователя</label>
                    <input type="text" id="name" name="name" placeholder="Вася Пупкин">
                    <label for="email">Электронная почта</label>
                    <input type="text" id="email" name="email" placeholder="primer@lala.ru">
                    <label for="appeal">Тип обращения</label>
                    <select id="appeal" name="Type of treatment">
                        <option value="complaint">Жалоба</option>
                        <option value="suggestion">Предложение</option>
                        <option value="gratitude">Благодарность</option>
                    </select>
                    <label for="sms">Вариант ответа:</label>
                    <div class="form__checkbox">
                        <label for="e-mail"></label>
                        <input type="checkbox" name="Reply by SMS" id="sms" checked><span>sms</span>
                        <input type="checkbox" name="Reply by e-mail" id="e-mail"><span>e-mail</span>
                    </div>
                    <button class="btn" type="submit">Отправить</button>
                </fieldset>
            </form>
            <a class="btn next__btn" href="./second.php">Страница №2</a>
        </main>
        <footer>
            <h2 class="footer__title">Старцев Виталий Витальевич 221-322</h2>
        </footer>
    </div>
</body>
</html>