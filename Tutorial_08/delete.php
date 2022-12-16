<?php
include('db.php');

if (isset($_POST['delete'])) {
    $id = $_POST['deleteId'];
    $sql = "DELETE FROM posts WHERE id='$id'";
    mysqli_query($connection, $sql);
    header("location:index.php");
}
?>
