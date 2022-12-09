<?php
session_start();
if (!isset($_SESSION["name"])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Home</title>
</head>

<body>
    <h1>Welcome <?php echo $_SESSION["name"] ?></h1>
    <a href="logout.php">Log Out</a>
</body>

</html>