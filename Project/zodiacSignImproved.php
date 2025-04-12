<?php

if (isset($_POST['date'])) {
    $date = $_POST['date'];
    $sep1Pos = -1;
    $sep2Pos = -1;
    for ($i = 0; $i < strlen($date); $i++) {
        if ($date[$i] < '0' || $date[$i] > '9') {
            if ($sep1Pos == -1) {
                $sep1Pos = $i;
            } else {
                $sep2Pos = $i;
                break;
            }
        }
    }

    if ($sep1Pos == -1 || $sep2Pos == -1) {
        return "Неверный формат даты";
    }

    if ($sep1Pos == 4) {
        $year = substr($date, 0, 4);
        $month = substr($date, 5, 2);
        $day = substr($date, 8, 2);
    } elseif ($sep2Pos == 7) {
        $year = substr($date, 3, 4);
        $month = substr($date, 0, 2);
        $day = substr($date, 8, 2);
    } elseif ($sep2Pos == 5) {
        $year = substr($date, 6, 4);
        $month = substr($date, 0, 2);
        $day = substr($date, 3, 2);
    }

    if ($month > 12 && $day <= 12) {
        $temp = $month;
        $month = $day;
        $day = $temp;
    }

    if (($month == 12 && $day >= 22) || ($month == 1 && $day <= 20)) {
        echo "Козерог";
    } elseif (($month == 1 && $day >= 22) || ($month == 2 && $day <= 20)) {
        echo "Водолей";
    } elseif (($month == 2 && $day >= 21) || ($month == 3 && $day <= 20)) {
        echo "Рыбы";
    } elseif (($month == 3 && $day >= 21) || ($month == 4 && $day <= 19)) {
        echo "Овен";
    } elseif (($month == 4 && $day >= 20) || ($month == 5 && $day <= 20)) {
        echo "Телец";
    } elseif (($month == 5 && $day >= 21) || ($month == 6 && $day <= 21)) {
        echo "Близнецы";
    } elseif (($month == 6 && $day >= 22) || ($month == 7 && $day <= 22)) {
        echo "Рак";
    } elseif (($month == 7 && $day >= 23) || ($month == 8 && $day <= 22)) {
        echo "Лев";
    } elseif (($month == 8 && $day >= 23) || ($month == 9 && $day <= 22)) {
        echo "Дева";
    } elseif (($month == 9 && $day >= 23) || ($month == 10 && $day <= 23)) {
        echo "Весы";
    } elseif (($month == 10 && $day >= 24) || ($month == 11 && $day <= 21)) {
        echo "Скорпион";
    } elseif (($month == 11 && $day >= 22) || ($month == 12 && $day <= 21)) {
        echo "Стрелец";
    } else {
        echo "Введите корректную дату";
    }
}
?>