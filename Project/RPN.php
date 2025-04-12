<?php
function evaluateRPN($expression)
{
    $parts = explode(' ', $expression);
    $stack = [];

    foreach ($parts as $index) {
        if (is_numeric($index)) {
            array_push($stack, (int) $index);
        } else {
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
                default:
                    echo "Неизвестный оператор";
            }
        }
    }
    return array_pop($stack);
}

if (isset($_POST["expression"])) {
    echo evaluateRPN($_POST['expression']);
}

?>