<?php
$file_path = 'stories.txt';

// Cek apakah file ada, jika tidak, buat file baru
if (!file_exists($file_path)) {
    file_put_contents($file_path, '');
}

// Cek izin file
if (!is_writable($file_path) || !is_readable($file_path)) {
    // Atur izin file
    if (chmod($file_path, 0666)) {
        echo "Izin file telah diatur.";
    } else {
        echo "Gagal mengatur izin file.";
    }
} else {
    echo "Izin file sudah sesuai.";
}
?>
