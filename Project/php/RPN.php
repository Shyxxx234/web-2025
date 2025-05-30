<?php
function evaluateRPN($expression)
{
    $parts = explode(' ', $expression);
    $stack = [];

    foreach ($parts as $index) {
        if ($index <> '') {
            if (is_numeric($index)) {
                array_push($stack, $index);
            } else {
                if (count($stack) < 2) {
                    return "Введено неверное арифметическое выражение";
                }
                $b = array_pop($stack);
                $a = array_pop($stack);
                switch ($index) {
                    case '+':
                        array_push($stack, $a + $b);
                        break;
                    case '-':
                        array_push($stack, $a - $b);
                        break;
                    case '*':
                        array_push($stack, $a * $b);
                        break;
                    case '/':
                        if ($b <> 0) {
                            array_push($stack, $a / $b);
                        } else {
                            return "division by 0";
                        }

                        break;
                    default:
                        return "Введен неизвестный оператор. Доступные операторы: +, -, *";
                }
            }
        }
    }
    return array_pop($stack);
}

if (isset($_POST['expression']) && (trim($_POST["expression"]) <> '')) {
    echo evaluateRPN($_POST['expression']);
} else {
    echo "Введите арифметическое выражение";
}
?>