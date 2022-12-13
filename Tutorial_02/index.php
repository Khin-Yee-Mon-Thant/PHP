<?php
$row = 1;
while ($row <= 6) {
    $space = 6;
    while ($space > $row) {
        echo "&nbsp&nbsp&nbsp";
        $space--;
    }
    $star = 1;
    while ($star <= (2 * $row - 1)) {
        echo "*&nbsp";
        $star++;
    }
    echo "<br>";
    $row++;
}
$row = 5;
while ($row >= 1) {
    $space = 6;
    while ($space > $row) {
        echo "&nbsp&nbsp&nbsp";
        $space--;
    }
    $star = 1;
    while ($star <= (2 * $row - 1)) {
        echo "*&nbsp";
        $star++;
    }
    echo "<br>";
    $row--;
}
?>
