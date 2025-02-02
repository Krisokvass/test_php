php<?php
$filenames = ['2.txt', '3.txt', '4.txt', '5.txt'];
foreach ($filenames as $file) {
    if (file_exists($file)) {
        unlink($file);
    }
}
echo "Файлы успешно удалены.";
?>
