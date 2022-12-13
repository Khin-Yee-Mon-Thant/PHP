<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Calculate Age</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="cal-age">
        <label for="birthdate">Enter Birthday</label>
        <input type="date" max="<?php echo date("Y-m-d", strtotime("-1 days")); ?>" name="birthdate">
        <button type="submit" class="btn">Calculate Age</button>
    </form>
    <?php
    $birthdate = $today = $totalDays = $days = $months = $years = "";
    if (isset($_POST['birthdate'])) {
        if (empty($_POST['birthdate'])) {
            echo '<p class="require">*Require to to enter birthday</p>';
        } else {
            $birthdate = date_create($_POST['birthdate']);
            $today = date_create(date('Y-m-d'));
            $interval = date_diff($birthdate, $today);
            $totalDays = $interval->format('%a');
            if ($totalDays < 30) {
                $days = $totalDays;
                echo "<p class='result'>" . $totalDays . " Days</p>";
            } elseif ($totalDays < 365) {
                $months = floor($totalDays / 30);
                $days = $totalDays % 30;
                echo "<p class='result'>" . $months . " Months, " . $days . " Days</p>";
            } else {
                $years = floor($totalDays / 365);
                $months = floor(($totalDays % 365) / 30);
                $days = (($totalDays % 365) % 30);
                echo "<p class='result'>" . $years . " Years, " . $months . " Months, " . $days . " Days</p>";
            }
        }
    }
    ?>
</body>

</html>
