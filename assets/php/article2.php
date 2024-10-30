<?php
// Include database connection
include 'koneksi.php';

// Get article ID from URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Increment read count
if ($id) {
    $updateQuery = "UPDATE artikel SET count = count + 1 WHERE id = $id";
    mysqli_query($conn, $updateQuery);
}

// Fetch the article data
$query = "SELECT * FROM artikel WHERE id = $id";
$result = mysqli_query($conn, $query);
$article = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($article['judul']); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            margin: 20px 0;
            padding: 20px;
        }
        .card-header {
            font-size: 24px;
            color: #007bff;
            margin-bottom: 10px;
        }
        .card-body {
            margin-bottom: 10px;
        }
        .card-footer {
            text-align: right;
        }
        .back-link {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <?php echo htmlspecialchars($article['judul']); ?>
        </div>
        <div class="card-body">
            <p><?php echo nl2br(htmlspecialchars($article['konten'])); ?></p>
            <p><strong>Read Count:</strong> <?php echo htmlspecialchars($article['count']); ?></p>
        </div>
        <div class="card-footer">
            <a href="../../technology.php" class="back-link">Back to Home</a>
        </div>
    </div>
</body>
</html>
