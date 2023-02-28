<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP lab_4</title>
    <link rel="stylesheet" href="../src/main.css">
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
                        function getOperand($arg1) {
                            if(strpbrk($arg1, '=') == TRUE) {
                                $arg1 = str_replace('=', '', $arg1);
                                return (int)$arg1;
                            }
                        }
                        function getOperator($arg1) {
                            if(strpbrk($arg1, '+') == TRUE) {
                                return 0;
                            }
                            if(strpbrk($arg1, '-') == TRUE) {
                                return 1;
                            }
                            if(strpbrk($arg1, '*') == TRUE) {
                                return 2;
                            }
                            if(strpbrk($arg1, '/') == TRUE) {
                                return 3;
                            }
                        }
                        switch (getOperator($equation)) {
                            case 0:
                                $operand1 = strstr($equation, '+', true);
                                $operand2 = getOperand(strstr($equation, '='));
                                echo $res = $operand2 - $operand1;
                                break;
                            case 1:
                                $operand1 = strstr($equation, '-', true);
                                $operand2 = getOperand(strstr($equation, '='));
                                echo $res = -($operand2 - $operand1);
                                break;
                            case 2:
                                $operand1 = strstr($equation, '*', true);
                                $operand2 = getOperand(strstr($equation, '='));
                                if($operand1 != 0) {
                                    echo $res = $operand2 / $operand1;
                                }else {
                                    echo '∅';
                                }
                                break;
                            case 3:
                                $operand1 = strstr($equation, '/', true);
                                $operand2 = getOperand(strstr($equation, '='));
                                if($operand1 != 0 and $operand2 != 0) {
                                    echo $res = $operand1 / $operand2;
                                }else {
                                    echo '∅';
                                }
                                break;
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