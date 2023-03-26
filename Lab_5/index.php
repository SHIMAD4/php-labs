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
            <form action="" class="form" method="POST">
                <div class="screens">
                    <input type="text" id="input" name="equation" placeholder="Ваш пример">
                    <textarea name="output" id="output" cols="46" placeholder="Ответ">
                    <?php 
                        function isDigit( $a ) {
                          if( (!$a) or (!is_numeric($a))) return false;
                          return true;
                        }

                        function calc( $val ) {
                          if(!$val) return 'Выражение не задано!';
                          if(isDigit($val)) return $val;

                          $args = explode('+', $val);
                          if(count($args) > 1) {
                            $sum = 0;
                            for($i = 0; $i < count($args); $i++) { 
                              $arg = $args[$i];
                              if(!isDigit($arg)) $arg = calc($arg);
                              $sum += $arg;
                            }
                            return $sum;
                          }
          
                          $args = explode("-", $val);
                          if( count($args) > 1 ) {
                            if (!is_numeric($args[0])) {
                                $args[0] = calc($args[0]);
                            }
          
                            $minusRez = $args[0];
          
                            for($i = 1; $i < count($args); $i++){
                              if (!is_numeric($args[$i])) {
                                  $args[$i] = calc($args[$i]);
                              }
                              $minusRez -= $args[$i];
                            }
                            return $minusRez;
                          }
          
                          $args = explode('*', $val);
                          if( count($args) > 1 ) {
                            $sup = 1;
          
                            for($i = 0; $i < count($args); $i++) {
                              $arg = $args[$i];
                              if( !isDigit($arg) ) {
                                $arg = calc($args[$i]);
                              }
                              $sup *= $arg; 
                            }
                            return $sup;
                          }
          
                          $args = explode("÷", $val); 
                          if( count($args) > 1 ) {
                            if (!is_numeric($args[0])) {
                                $args[0] = calc($args[0]);
                            }
                            $del = $args[0];
                            for($i = 1; $i < count($args); $i++){
                                if (!is_numeric($args[$i])) {
                                    $args[$i] = calc($args[$i]);
                                }
                                $del /= $args[$i];
                            }
                            return $del;
                          }
                          return 'Недопустимые символы в выражении';
                        }

                        function SqValid( $val ) {
                          $open = 0;

                          for($i = 0; $i < strlen($val); $i++) {
                            if($val[$i] == '(') $open++;
                            else {
                              if($val[$i] == ')'){
                                $open--;
                                if($open < 0) return false;
                              }
                            }
                          }
                          if( $open !== 0 ) return false;
                          return true;
                        }

                        function SqCalc($val) {
                            if (!SqValid($val)) return 'Неправильная расстановка скобок';

                            $start = strpos($val, '(');
                            if ($start === false) return calc($val);
                            
                            $end = $start + 1;
                            $open = 1;

                            while ($open && $end < strlen($val)) {
                                if ($val[$end] == '(') $open++;
                                if ($val[$end] == ')') $open--;
                                $end++;
                            }

                            $new_val = substr($val, 0, $start);
                            $new_val .= SqCalc(substr($val, $start + 1, $end - $start - 2));
                            $new_val .= substr($val, $end);
                        
                            return SqCalc($new_val);
                        }

                        if (isset($_POST['equation'])) {
                            $res = SqCalc($_POST['equation']);
                            echo $res;
                        };
                    ?>
                    </textarea>
                </div>
                <div class="keyboard">
                    <div class="operands">
                        <button class="btn" type="button" data-value="0">0</button>
                        <button class="btn" type="button" data-value="1">1</button>
                        <button class="btn" type="button" data-value="2">2</button>
                        <button class="btn" type="button" data-value="3">3</button>
                        <button class="btn" type="button" data-value="4">4</button>
                        <button class="btn" type="button" data-value="5">5</button>
                        <button class="btn" type="button" data-value="6">6</button>
                        <button class="btn" type="button" data-value="7">7</button>
                        <button class="btn" type="button" data-value="8">8</button>
                        <button class="btn" type="button" data-value="9">9</button>
                        <button class="btn" type="button" data-value="AC">AC</button>
                        <input class="btn" data-value="=" type="submit" value="=" name="send">
                    </div>
                    <div class="operators">
                        <div>
                            <button class="btn" type="button" data-value="(">(</button>
                            <button class="btn" type="button" data-value=")">)</button>
                        </div>
                        <div>
                            <button class="btn" type="button" data-value="+">+</button>
                            <button class="btn" type="button" data-value="-">-</button>
                        </div>
                        <div>
                            <button class="btn" type="button" data-value="*">*</button>
                            <button class="btn" type="button" data-value="/">/</button>
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