<?php include('db.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/lib/jquery-3.6.1.min.js"></script>
    <script src="js/script.js"></script>
    <title>Tutorial_08</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-1">
                <a class="btn btn-primary" href="insert.php">Create</a>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h2>Post List</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th id="id">ID</th>
                        <th id="title">Title</th>
                        <th id="content">Content</th>
                        <th id="publish">Is Publish</th>
                        <th id="date">Created Date</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM posts";
                    $query = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <td class="id"><?php echo $row['id']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td style="width: 10%;"><?php echo $row['content']; ?></td>
                            <td>
                                <?php
                                if ($row['is_published'] == 0) {
                                    echo "Unpublished";
                                } else {
                                    echo "Published";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                $date = date("M d, Y", strtotime($row['created_datetime']));
                                echo $date;
                                ?>
                            </td>
                            <td>
                                <a href="view.php?view=<?php echo $row['id']; ?>" class="btn btn-info">View</a>
                                <a href="update.php?update=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
                                <button class="btn btn-danger delete-btn">Delete</button>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="delete-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="delete.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="deleteId" id="delete-id">
                        Are you sure you want to delete?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="delete">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
