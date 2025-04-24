<?php
function evaluateRPN($expression)
{
    $parts = explode(separator: ' ', string: $expression);
    $stack = [];

    foreach ($parts as $index) {
        if (is_numeric(value: $index)) {
            array_push(array: $stack, values: (int) $index);
        } else {
            $b = array_pop(array: $stack);
            $a = array_pop(array: $stack);
            switch ($index) {
                case '+':
                    array_push(array: $stack, values: $a + $b);
                    break;
                case '-':
                    array_push(array: $stack, values: $a - $b);
                    break;
                case '*':
                    array_push(array: $stack, values: $a * $b);
                    break;
                default:
                    echo "Неизвестный оператор";
            }
        }
    }
    return array_pop(array: $stack);
}

if (isset($_POST["expression"])) {
    echo evaluateRPN(expression: $_POST['expression']);
}

?>