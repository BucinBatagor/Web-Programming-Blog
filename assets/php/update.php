<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $penulis = $_POST['author'];
    $judul = $_POST['title'];
    $kategori = $_POST['category'];
    $konten = $_POST['content'];
    $gambar = $_FILES['image']['name'];
    $target_dir = "../images/";
    $target_file = $target_dir . basename($gambar);

    $sql = "UPDATE artikel SET penulis='$penulis', judul='$judul', kategori='$kategori', konten='$konten'";

    if ($gambar) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $sql .= ", gambar='$gambar'";
        } else {
            echo "Error uploading image.";
        }
    }

    $sql .= " WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        header('Location: ../../admin.html?section=manage-data');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
