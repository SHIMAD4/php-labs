<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <img src="img/logo.svg" alt="logo">
            <h2 class="header__title">Лабораторная работа №1</h2>
        </header>
        <main>
            <?php
                $pics = array("img/pic_1.jpg", "img/pic_2.jpg", "img/pic_3.jpg", "img/pic_4.jpg");
                for ( $i = 0 ; $i < 4 ; $i++ ) {
                    echo "<img src=\"$pics[$i]\" width=\"250px\">";
                }
            ?>
        </main>
        <footer>
            <h2>Старцев Виталий Витальевич 221-322</h2>
        </footer>
    </div>
</body>
</html>