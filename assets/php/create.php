<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $penulis = $_POST['penulis'];
    $judul = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $konten = $_POST['konten'];
    $gambar = $_FILES['gambar'];

    $targetDir = '../images/';
    $targetFile = $targetDir . basename($gambar['name']);
    
    if (move_uploaded_file($gambar['tmp_name'], $targetFile)) {
        $sql = "INSERT INTO artikel (penulis, judul, kategori, konten, gambar) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssss', $penulis, $judul, $kategori, $konten, $targetFile);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Artikel berhasil ditambahkan!";
            header('Location: ../../admin.html');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Failed to upload image.";
    }
    $conn->close();
}
?>
