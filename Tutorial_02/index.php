<?php
$i = 1;
while ($i <= 6) {
    $j = 6;
    while ($j > $i) {
        echo "&nbsp&nbsp&nbsp";
        $j--;
    }
    $k = 1;
    while ($k <= (2 * $i - 1)) {
        echo "*&nbsp";
        $k++;
    }
    echo "<br>";
    $i++;
}
$i = 5;
while ($i >= 1) {
    $j = 6;
    while ($j > $i) {
        echo "&nbsp&nbsp&nbsp";
        $j--;
    }
    $k = 1;
    while ($k <= (2 * $i - 1)) {
        echo "*&nbsp";
        $k++;
    }
    echo "<br>";
    $i--;
}
?>
