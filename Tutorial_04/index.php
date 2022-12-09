<?php
session_start();
if (isset($_SESSION["name"])) {
    header("location:home.php");
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
    <title>Log in & Log out</title>
</head>

<body>
    <?php
    $name = $nameErr = $pwd = $pwdErr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "*Name is required";
        } else {
            $name = $_POST["name"];
        }
        if (empty($_POST["pwd"])) {
            $pwdErr = "*Password is required";
        }
        if (!empty($_POST["name"]) && !empty($_POST["pwd"])) {
            $_SESSION["name"] = $_POST["name"];
            header("location:home.php");
        }
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="login-form">
        <input type="text" name="name" placeholder="Enter Username" value="<?php echo $name; ?>"><br>
        <span class="error"><?php echo $nameErr; ?></span><br>
        <input type="password" name="pwd" placeholder="Enter Password" value=""><br>
        <span class="error"><?php echo $pwdErr; ?></span><br>
        <button type="submit" class="btn">Login</button>
    </form>
</body>

</html>
