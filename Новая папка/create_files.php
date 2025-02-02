<?php
$filenames = ['2.txt', '3.txt', '4.txt', '5.txt'];

foreach ($filenames as $filename) {
    file_put_contents($filename, '0');
}

echo "Файлы созданы и инициализированы нулями.";
?>
