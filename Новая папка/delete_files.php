<?php
$filenames = ['2.txt', '3.txt', '4.txt', '5.txt'];

foreach ($filenames as $filename) {
    if (file_exists($filename)) {
        unlink($filename);
    }
}

echo "Файлы удалены.";
?>