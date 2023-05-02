<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Work</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="wrapper">

        <?php if($_COOKIE['user'] == ''): ?>

        <form class="login-form" action="./auth.php" method="post">
            <label class="login">
                <input name="login" id="login" type="text" class="login__input" placeholder="Введите логин">
            </label>
            <label class="pass">
                <input name="pass" id="pass" type="text" class="pass__input" placeholder="Введите пароль">
            </label>
            <label class="button">
                <button type="submit">Войти</button>
            </label>
        </form>

        <?php else: ?>

        <div class="account">
            <form action="./sms.php" method="post" class="sms-form">
                <h2 class="hello-msg">Привет <?= $_COOKIE['user'] ?>.</br>Чтобы выйти нажмите
                    <a href="./exit.php" class="exit-btn">здесь.</a>
                </h2>
                <label class="message">
                    <textarea name="message" id="message" class="message" cols="40" rows="8"></textarea>
                </label>
                <label class="save">
                    <!-- <input type="hidden" name="save-btn" value="0"> -->
                    <input type="checkbox" class="save-btn" name="save-btn" id="save-btn" value="save"><span>save message</span>
                </label>
                <label class="button">
                    <button type="submit">Отправить</button>
                </label>
            </form>
            <div class="view-sms"> <?php include 'view.php'; ?> </div>
        </div>

        <?php endif; ?>

    </div>
</body>
</html>