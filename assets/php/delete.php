<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM artikel WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        header('Location: ../../admin.html?section=manage-data');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
