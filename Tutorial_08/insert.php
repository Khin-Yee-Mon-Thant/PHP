<?php include('db.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Create</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <h2>Create Post</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <label for="title">Title</label>
                            <input type="text" id="title " name="title" class="form-control my-2">
                            <label for="content">Content</label>
                            <textarea id="content" name="content" cols="30" rows="5" class="form-control my-2"></textarea>
                            <input class="form-check-input" type="checkbox" name="publish" id="flexCheckDefault">
                            <label class="form-check-label mb-2" for="flexCheckDefault">Publish</label><br>
                            <a class="btn btn-secondary" href="index.php">Back</a>
                            <button class="btn btn-primary float-end" type="submit">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_POST['title']) && isset($_POST['content'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    if (isset($_POST['publish'])) {
        $is_published = 1;
    } else {
        $is_published = 0;
    }
    $sql = "INSERT INTO posts(title,content,is_published) VALUES ('$title','$content','$is_published')";
    mysqli_query($connection, $sql);
    header("location:index.php");
}
?>
