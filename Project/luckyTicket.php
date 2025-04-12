<?php
if (isset($_POST['begin'])) {
    $begin = $_POST['begin'];
}

if (isset($_POST['end'])) {
    $end = $_POST['end'];
}

if (($begin <= 999999 && $end <= 999999) && ($begin >= 100000 && $end >= 100000)) {
    for ($i = $begin; $i <= $end; $i++) {
        $number = (string) $i;
        $first_sum = $number[0] + $number[1] + $number[2];
        $second_sum = $number[3] + $number[4] + $number[5];
        if ($first_sum == $second_sum) {
            echo $i . "<br>";
        }
    }
} else {
    echo "Введен неверный диапазон";
}
?>