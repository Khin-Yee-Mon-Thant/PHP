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
    <title>View Detail</title>
</head>

<body>
    <?php
    if (isset($_GET['view'])) {
        $id = $_GET['view'];
        $sql = "SELECT * FROM posts WHERE id='$id'";
        $query = mysqli_query($connection, $sql);
        $post = mysqli_fetch_assoc($query);
    }
    ?>
    <div class="col-6 mx-auto mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Post Detail</h2>
            </div>
            <div class="card-body">
                <h2><?php echo $post['title']; ?></h2>
                <i>Published at</i>
                <span><?php echo date("M d, Y", strtotime($post['created_datetime'])); ?></span>
                <p class="mt-2 preserve"><?php echo $post['content']; ?></p>
                <a class="btn btn-secondary mt-2" href="index.php">Back</a>
            </div>
        </div>
    </div>


</body>

</html>
