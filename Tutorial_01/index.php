<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Chessboard</title>
</head>

<body>
    <table cellspacing="0">
        <?php
        $row = 1;
        while ($row <= 8) {
            echo "<tr>";
            $col = 1;
            while ($col <= 8) {
                $cell = $row + $col;
                if ($cell % 2 == 0) {
                    echo "<td class='white'></td>";
                } else {
                    echo "<td class='black'></td>";
                }
                $col++;
            }
            echo "</tr>";
            $row++;
        }
        ?>
    </table>
</body>

</html>
