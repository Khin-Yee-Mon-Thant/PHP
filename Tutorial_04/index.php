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
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Log in & Log out</title>
</head>

<body>
    <?php
    define("USER", "username");
    define("PASSWORD", "123456");
    $name = $nameErr = $pwd = $pwdErr = $invalid = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "*Name is required";
        } else if ($_POST["name"] != USER) {
            $nameErr =  "Invalid username!";
        } else {
            $name = $_POST["name"];
        }

        if (empty($_POST["pwd"])) {
            $pwdErr = "*Password is required";
        } else if ($_POST['pwd'] != PASSWORD) {
            $pwdErr = "Invalid password!";
        }

        if ($_POST["name"] == USER && $_POST["pwd"] == PASSWORD) {
            $_SESSION["name"] = $_POST["name"];
            $_SESSION["pwd"] = $_POST["pwd"];
            header("location:home.php");
        }
    }

    ?>
    <div class="error-container">
        <span class="invalid"><?php echo $invalid; ?></span>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="login-form">
        <input type="text" name="name" placeholder="Enter Username" value="<?php echo $name; ?>">
        <span class="error"><?php echo $nameErr; ?></span>
        <input type="password" name="pwd" placeholder="Enter Password" value="">
        <span class="error">
            <?php echo $pwdErr; ?>
        </span>
        <button type="submit" class="btn">Login</button>
    </form>
</body>

</html>
