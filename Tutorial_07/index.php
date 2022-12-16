<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Tutorial_07</title>
</head>

<body>
    <?php
    require_once 'lib/phpqrcode/qrlib.php';
    $require = $txt = $qrcode = "";
    if (isset($_POST['submit'])) {
        if (empty($_POST['txt'])) {
            $require = '*Require text input';
        } else {
            $txt = $_POST['txt'];
            $qrcode = "generate/" . $txt . ".png";
            QRcode::png($txt, $qrcode);
        }
    }
    if (isset($_GET['delete'])) {
        unlink($_GET['delete']);
        header("location:index.php");
    }
    ?>
    <form action="index.php" method="POST" class="qr-form">
        <label for="txt">Enter text:</label>
        <input type="text" name="txt"><br>
        <span class="require"><?php echo $require; ?></span><br>
        <button type="submit" name="submit" class="submit">Generate QR Code</button>
    </form>
    <table class="qr-table">
        <tr>
            <th>QR Code</th>
            <th>Directory</th>
            <th>Action</th>
        </tr>
        <?php
        $images = glob("generate/*.png");
        foreach ($images as $image) { ?>
            <tr>
                <td><img src="<?php echo $image ?>"></td>
                <td>
                    <p><?php echo $image; ?></p>
                </td>
                <td><a href="?delete=<?php echo $image; ?>" class="del-btn">Delete</a></td>
            </tr>
        <?php } ?>
        <table>
</body>

</html>
