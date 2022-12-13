<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Tutorial_06</title>
</head>

<body>
    <div class="upload">
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="folder">Enter Folder Name</label>
            <input type="text" name="folder" value=""><br>
            <input type="file" name="img"><br>
            <input type="submit" name="submit" value="Upload">
        </form>
    </div>
    <?php
    $dirs = array_filter(glob('*'), 'is_dir');
    foreach ($dirs as $dir) {
        $images = glob($dir . DIRECTORY_SEPARATOR . "*.{jpg,png,gif}", GLOB_BRACE);
        foreach ($images as $image) { ?>
            <form action="" method="POST" class="container">
                <input value="<?php echo $image; ?>" name="file" type="hidden">
                <div class="thumbnail"><img src="<?php echo $image; ?>" name="del-img"></div>
                <input type="submit" value="Delete" name="del-btn" class="del-btn">
            </form>
            <?php }
    }
    if (isset($_POST['del-btn'])) {
        unlink($_POST['file']);
    }
    if (isset($_POST['submit'])) {
        if (empty($_POST['folder'])) {
            echo "folder name require";
        }
        if ($_FILES['img']['size'] == 0) {
            echo "image file require";
        }
        if (!empty($_POST['folder']) && $_FILES['img']['size'] != 0) {
            $folder = $_POST['folder'];
            $img_name = $_FILES['img']['name'];
            $img_tmpname = $_FILES['img']['tmp_name'];
            $img_size = $_FILES['img']['size'];
            //Check if folder already exists
            if (!is_dir($folder)) {
                mkdir($folder);
            }
            $uploadOk = 1;
            $path = $folder . DIRECTORY_SEPARATOR;
            $dir = $path . $img_name;
            // Check if file already exists
            if (file_exists($dir)) {
                echo "File already exists.";
                $uploadOk = 0;
            }
            $allowed_types = array('jpg', 'png', 'jpeg', 'gif');
            $file_ext = strtolower(pathinfo($dir, PATHINFO_EXTENSION));
            //Allow only JPG, JPEG, PNG & GIF etc formats
            if ($file_ext != "jpg" && $file_ext != "png" && $file_ext != "jpeg" && $file_ext != "gif") {
                echo "Only JPG, JPEG, PNG & GIF files are allowed";
                $uploadOk = 0;
            }
            // Check file size
            if ($img_size > 500000) {
                echo "File is too large.";
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            } else {
                if (move_uploaded_file($img_tmpname, $dir)) {
                    echo "The file " . $img_name . " has been uploaded.";
                    } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }
    ?>
</body>

</html>