<?php
if (isset($_GET['digit'])) {
    $digit = $_GET['digit'];
    if ($digit == 0) {
        echo "<p>Ноль</p>";
    } elseif ($digit == 1) {
        echo "<p>Один</p>";
    } elseif ($digit == 2) {
        echo "<p>Два</p>";
    } elseif ($digit == 3) {
        echo "<p>Три</p>";
    } elseif ($digit == 4) {
        echo "<p>Четыре</p>";
    } elseif ($digit == 5) {
        echo "<p>Пять</p>";
    } elseif ($digit == 6) {
        echo "<p>Шесть</p>";
    } elseif ($digit == 7) {
        echo "<p>Семь</p>";
    } elseif ($digit == 8) {
        echo "<p>Восемь</p>";
    } elseif ($digit == 9) {
        echo "<p>Девять</p>";
    } else {
        echo "<p>Введите цифру</p>";
    }
}
?>