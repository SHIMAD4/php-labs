<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP lab_4</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <img src="img/logo.svg" alt="logo" width="200">
            <h2 class="header__title">Лабораторная работа №4</h2>
        </header>
        <main class="main">
            <h2 class="main__heading">Введите уравнение в виде: <span>a + x = b</span></h2>
            <p class="main__subtitle">
                Где <span>X</span> неизменная переменная, оператор может быть <span>+</span>, <span>-</span>, <span>/</span>, <span>*</span>
            </p>
            <form action="" method="POST">
                <input class="main__input" type="text" name="equation">
                <input class="btn main__answer" type="submit" name="send" value="Решить">
            </form>
            <textarea class="main__output" name="answers" id="output" cols="25" rows="8">
                <?php
                    if(isset($_POST)){
                        $equation = $_POST["equation"];
                        $equation = str_replace(' ', '', $equation);
                        if(strpbrk($equation, '+') == TRUE) {
                            $operand1 = strstr($equation, '+', true);
                            $operand2 = strstr($equation, '=');
                            if(strpbrk($operand2, '=') == TRUE) {$operand2 = str_replace('=', '', $operand2); $operand2 = (int)$operand2;}
                            $res = $operand2 - $operand1;
                            echo $res;
                        }
                        if(strpbrk($equation, '-') == TRUE) {
                            $operand1 = strstr($equation, '-', true);
                            $operand2 = strstr($equation, '=');
                            if(strpbrk($operand2, '=') == TRUE) {$operand2 = str_replace('=', '', $operand2); $operand2 = (int)$operand2;}
                            $res = $operand2 - $operand1;
                            echo -$res;
                        }
                        if(strpbrk($equation, '*') == TRUE) {
                            $operand1 = strstr($equation, '*', true);
                            $operand2 = strstr($equation, '=');
                            if(strpbrk($operand2, '=') == TRUE) {$operand2 = str_replace('=', '', $operand2); $operand2 = (int)$operand2;}
                            $res = $operand2 / $operand1;
                            echo $res;
                        }
                        if(strpbrk($equation, '/') == TRUE) {
                            $operand1 = strstr($equation, '/', true);
                            $operand2 = strstr($equation, '=');
                            if(strpbrk($operand2, '=') == TRUE) {$operand2 = str_replace('=', '', $operand2); $operand2 = (int)$operand2;}
                            $res = $operand2 * $operand1;
                            echo $res;
                        }
                    };
                ?>
            </textarea>
        </main>
        <footer>
            <h2 class="footer__title">Старцев Виталий Витальевич 221-322</h2>
        </footer>
    </div>
</body>
</html>