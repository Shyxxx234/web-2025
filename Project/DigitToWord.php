<?php
if (isset($_GET['digit'])) {
    $digit = $_GET['digit'];
    switch ($digit) {
        case 0:
            echo "<p>Ноль</p>";
            break;  
        case 1:
            echo "<p>Один</p>";
            break;
        case 2:
            echo "<p>Два</p>";
            break;
        case 3:
            echo "<p>Три</p>";
            break;
        case 4:
            echo "<p>Четыре</p>";
            break;
        case 5:
            echo "<p>Пять</p>";
            break;
        case 6:
            echo "<p>Шесть</p>";
            break;
        case 7:
            echo "<p>Семь</p>";
            break;
        case 8:
            echo "<p>Восемь</p>";
            break;
        case 9:
            echo "<p>Девять</p>";
            break;
        default:
            echo "<p>Введите цифру</p>";
            break;
    }
}
?>