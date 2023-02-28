<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP lab_5</title>
    <link rel="stylesheet" href="../src/main.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <img src="img/logo.svg" alt="logo" width="200">
            <h2 class="header__title">Лабораторная работа №5</h2>
        </header>
        <main class="main">
            <form action="" class="form">
                <div class="screens">
                    <input type="text" id="input" placeholder="Ваш пример">
                    <textarea name="output" id="output" cols="46" rows="2" placeholder="Ответ"></textarea>
                </div>
                <div class="keyboard">
                    <div class="operands">
                        <button class="btn" data-value="0">0</button>
                        <button class="btn" data-value="1">1</button>
                        <button class="btn" data-value="2">2</button>
                        <button class="btn" data-value="3">3</button>
                        <button class="btn" data-value="4">4</button>
                        <button class="btn" data-value="5">5</button>
                        <button class="btn" data-value="6">6</button>
                        <button class="btn" data-value="7">7</button>
                        <button class="btn" data-value="8">8</button>
                        <button class="btn" data-value="9">9</button>
                        <button class="btn" data-value="AC">AC</button>
                        <button class="btn" data-value="=">=</button>
                    </div>
                    <div class="operators">
                        <div>
                            <button class="btn" data-value="(">(</button>
                            <button class="btn" data-value=")">)</button>
                        </div>
                        <div>
                            <button class="btn" data-value="+">+</button>
                            <button class="btn" data-value="-">-</button>
                        </div>
                        <div>
                            <button class="btn" data-value="*">*</button>
                            <button class="btn" data-value="/">/</button>
                        </div>
                    </div>
                </div>
            </form>
        </main>
        <footer>
            <h2 class="footer__title">Старцев Виталий Витальевич 221-322</h2>
        </footer>
    </div>
    <script src="./script.js"></script>
</body>
</html>