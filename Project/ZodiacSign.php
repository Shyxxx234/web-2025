<?php
if (isset($_GET['date'])) {
    $date = $_GET['date'];
    list($day, $month, $year) = explode('.', $date);
    if (($month == 12 && $day >= 22) || ($month == 1 && $day <= 20)) {
        echo "<p>Козерог</p>";
    } elseif (($month == 1 && $day >= 22) || ($month == 2 && $day <= 20)) {
        echo "<p>Водолей</p>";
    } elseif (($month == 2 && $day >= 21) || ($month == 3 && $day <= 20)) {
        echo "<p>Рыбы</p>";
    } elseif (($month == 3 && $day >= 21) || ($month == 4 && $day <= 19)) {
        echo "<p>Овен</p>";
    } elseif (($month == 4 && $day >= 20) || ($month == 5 && $day <= 20)) {
        echo "<p>Телец</p>";
    } elseif (($month == 5 && $day >= 21) || ($month == 6 && $day <= 21)) {
        echo "<p>Близнецы/p>";
    } elseif (($month == 6 && $day >= 22) || ($month == 7 && $day <= 22)) {
        echo "<p>Рак</p>";
    } elseif (($month == 7 && $day >= 23) || ($month == 8 && $day <= 22)) {
        echo "<p>Лев</p>";
    } elseif (($month == 8 && $day >= 23) || ($month == 9 && $day <= 22)) {
        echo "<p>Дева</p>";
    } elseif (($month == 9 && $day >= 23) || ($month == 10 && $day <= 23)) {
        echo "<p>Весы</p>";
    } elseif (($month == 10 && $day >= 24) || ($month == 11 && $day <= 21)) {
        echo "<p>Скорпион</p>";
    } elseif (($month == 11 && $day >= 22) || ($month == 12 && $day <= 21)) {
        echo "<p>Стрелец</p>";
    } else {
        echo "<p>Введите дату</p>";
    }
}
?>