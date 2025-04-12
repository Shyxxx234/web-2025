<?php
function factorial($n) {
    if ($n == 0 || $n == 1) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}

if (isset($_POST['number'])) {
    $number =  factorial($_POST['number']);
    echo $number;
}
?>