<?php
require 'StoryManager.php';

$storyManager = new StoryManager();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['undo'])) {
        $storyManager->undoStory();
    }
}

$stories = $storyManager->getAllStories();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bagikan Ceritamu - Lihat Cerita yang Telah Dibuat</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
    <div class="container">
        <h1>Cerita yang Telah Dibuat</h1>
        <?php
        foreach ($stories as $story) {
            echo "<div class='story'>";
            echo "<h3>" . htmlspecialchars($story['title']) . "</h3>";
            echo "<p>" . nl2br(htmlspecialchars($story['content'])) . "</p>";
            echo "</div>";
        }
        ?>
        <?php if (!empty($stories)) : ?>
            <form action="lihat_cerita.php" method="POST" class="input-form">
                <input type="hidden" name="undo" value="1">
                <input type="submit" value="Hapus Cerita Terbaru">
            </form>
        <?php endif; ?>
        <a href="index.php" class="center-button"><button>Kembali ke Halaman Utama</button></a>
    </div>
</body>
</html>
