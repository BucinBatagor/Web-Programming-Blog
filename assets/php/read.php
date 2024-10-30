<?php
require_once 'koneksi.php';

$query = "SELECT * FROM artikel";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td data-field='author' class='editable'>{$row['penulis']}</td>
                <td data-field='title' class='editable'>{$row['judul']}</td>
                <td data-field='category' class='editable'>{$row['kategori']}</td>
                <td data-field='content' class='editable'>{$row['konten']}</td>
                <td>
                    <img src='assets/images/{$row['gambar']}' alt='Gambar Artikel' width='100'><br>
                    <input type='file' data-field='image-input' style='display:none;' class='image-input'>
                </td>
                <td>
                    <button class='edit-btn' data-id='{$row['id']}'>Edit</button>
                    <button class='save-btn' data-id='{$row['id']}' style='display:none;'>Simpan</button>
                    <button class='delete-btn' data-id='{$row['id']}'>Hapus</button>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6'>Tidak ada artikel ditemukan.</td></tr>";
}

$conn->close();
?>
