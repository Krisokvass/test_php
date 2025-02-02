php<?php
$filenames = ['2.txt', '3.txt', '4.txt', '5.txt'];
foreach ($filenames as $file) {
    file_put_contents($file, "0");
}
echo "Файлы успешно созданы.";
?>
