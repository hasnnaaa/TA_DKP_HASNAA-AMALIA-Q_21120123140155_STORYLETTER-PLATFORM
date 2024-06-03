<?php
session_start();
require 'StoryManager.php';

if (!isset($_SESSION['storyStack'])) {
    $_SESSION['storyStack'] = [];
}

function saveStoryVersion($judul, $cerita) {
    $_SESSION['storyStack'][] = [
        'title' => $judul,
        'content' => $cerita
    ];
}

$storyManager = new StoryManager();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['judul']) && isset($_POST['cerita'])) {
        $judul = $_POST['judul'];
        $cerita = $_POST['cerita'];
        saveStoryVersion($judul, $cerita);
        $story = new Story($judul, $cerita);
        $storyManager->saveStory($story);
    }
}

$stories = $storyManager->getAllStories();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bagikan Ceritamu - Buat Cerita Baru</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
        <h1>Buat Cerita Baru</h1>
        <form action="buat_cerita.php" method="POST" class="input-form">
            <label for="judul">Judul:</label><br>
            <input type="text" id="judul" name="judul" required><br>
            <label for="cerita">Cerita:</label><br>
            <textarea id="cerita" name="cerita" rows="5" cols="50" required></textarea><br>
            <input type="submit" value="Simpan">
        </form>
        <a href="index.php" class="center-button"><button>Kembali ke Halaman Utama</button></a>
    </div>
</body>
</html>