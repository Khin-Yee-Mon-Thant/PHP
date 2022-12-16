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
    <?php
    $requireFolder = $requireImage = $message = $folder = $error = "";
    if (isset($_POST['submit'])) {

        if (empty($_POST['folder'])) {
            $requireFolder = "*Folder name require";
        } else {
            $folder = $_POST['folder'];
        }

        if ($_FILES['img']['size'] == 0) {
            $requireImage = "*Image file require";
        }

        if (!empty($_POST['folder']) && $_FILES['img']['size'] != 0) {
            $uploadOk = 1;
            $img_name = $_FILES['img']['name'];
            $img_tmpname = $_FILES['img']['tmp_name'];
            $img_size = $_FILES['img']['size'];

            //Check if folder already exists
            if (!is_dir($folder)) {
                mkdir($folder);
            }

            // Check if file already exists
            $path = $folder . DIRECTORY_SEPARATOR;
            $dir = $path . $img_name;
            if (file_exists($dir)) {
                $error = "File already exists.";
                $uploadOk = 0;
            }

            //Allow only JPG, JPEG, PNG & GIF etc formats
            $allowed_types = array('jpg', 'png', 'jpeg', 'gif');
            $file_ext = strtolower(pathinfo($dir, PATHINFO_EXTENSION));
            if ($file_ext != "jpg" && $file_ext != "png" && $file_ext != "jpeg" && $file_ext != "gif") {
                $error = "Only JPG, JPEG, PNG & GIF files are allowed";
                $uploadOk = 0;
            // Check file size
            } elseif ($img_size > 500000) {
                $error = "File is too large.";
                $uploadOk = 0;
            }

            //Upload
            if ($uploadOk == 1) {
                move_uploaded_file($img_tmpname, $dir);
                $message = "The file " . $img_name . " has been uploaded.";
                $folder = "";
            }
        }
    }

    if (isset($_GET['delete'])) {
        unlink($_GET['delete']);
        header("location:index.php");
    }
    ?>
    <form action="" method="POST" enctype="multipart/form-data" class="upload">
        <label for="folder">Enter Folder Name</label>
        <input type="text" name="folder" value="<?php echo $folder; ?>">
        <span class="require"><?php echo $requireFolder ?></span>
        <input type="file" name="img" class="input-box">
        <span class="require"><?php echo $requireImage ?></span>
        <span class="error"><?php echo $error ?></span>
        <button type="submit" name="submit" class="submit">Upload</button>
    </form>
    <div class="message">
        <p><?php echo $message; ?></p>
    </div>
    <table class="img-table">
        <tr>
            <th>Image</th>
            <th>Directory</th>
            <th>Action</th>
        </tr>
        <?php
        $dirs = array_filter(glob('*'), 'is_dir');
        foreach ($dirs as $dir) {
            $images = glob($dir . DIRECTORY_SEPARATOR . "*.{jpg,png,gif}", GLOB_BRACE);
            foreach ($images as $image) { ?>
                <tr>
                    <td><img src="<?php echo $image; ?>"></td>
                    <td>
                        <p><?php echo $image; ?></p>
                    </td>
                    <td><a href="?delete=<?php echo $image; ?>" class="del-btn">Delete</a></td>
                </tr>
        <?php }
        } ?>
        <table>
</body>

</html>
