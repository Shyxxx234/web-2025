<?php
if (isset($_POST['begin'])) {
    $begin = $_POST['begin'];
}

if (isset($_POST['end'])) {
    $end = $_POST['end'];
}

if (($begin <= 999999 && $end <= 999999) && ($begin >= 100000 && $end >= 100000)) {
    for ($i = $begin; $i <= $end; $i++) {
        $number = (int)$i;
        $first_sum = (floor($number / 100000) % 10)  + (floor($number / 10000) % 10) + (floor($number / 1000) % 10);
        $second_sum = (floor($number / 100) % 10) + (floor($number / 10) % 10) + ($number % 10);
        if ($first_sum == $second_sum) {
            echo $i . "<br>";
        }
    }
} else {
    echo "Введен неверный диапазон";
}
?>