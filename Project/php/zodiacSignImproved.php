<?php
$month = 0;
$day = 0;
$year = 0;
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
    $date = str_replace(['january', 'январь'], 1, $date);
    $date = str_replace(['february', 'февраль'], 1, $date);
    $date = str_replace(['march', 'март'], 1, $date);
    $date = str_replace(['april', 'апрель'], 1, $date);
    $date = str_replace(['may', 'май'], 1, $date);
    $date = str_replace(['june', 'июнь'], 1, $date);
    $date = str_replace(['january', 'январь'], 1, $date);
    $date = str_replace(['january', 'январь'], 1, $date);
    $date = str_replace(['january', 'январь'], 1, $date);
    $date = str_replace(['january', 'январь'], 1, $date);
    $date = str_replace(['january', 'январь'], 1, $date);
    $date = str_replace(['january', 'январь'], 1, $date);



    if ($sep1Pos == -1 || $sep2Pos == -1) {
        return "Неверный формат даты";
    }
    
    // $month = match ($month) {
    //     'january', 'январь' => 1,
    //     'february', 'февраль' => 2,  
    //     'march', 'март' => 3,
    //     'april', 'апрель' => 4,
    //     'may', 'май' => 5,
    //     'june', 'июнь' => 6,
    //     'july', 'июль' => 7,
    //     'august', 'август' => 8,
    //     'september', 'сентябрь' => 9,
    //     'october', 'октябрь' => 10,
    //     'november', 'ноябрь' => 11,
    //     'december', 'декабрь' => 12,
    //     default => 0
    // };

        $year = substr($date, 0, $sep1Pos - 1);
        $month = substr($date, $sep1Pos + 1, $sep2Pos - $sep1Pos);
        $day = substr($date, $sep2Pos + 1, strlen($date) - $sep2Pos);




    if ($month > 12 && $day <= 12) {
        $temp = $month;
        $month = $day;
        $day = $temp;
    }

    if ($month < 10){
        $month = "0" . $month;
    }
    echo $month;

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