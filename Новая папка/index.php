<?php
// Обработка голосования
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vote = $_POST['vote'] ?? null;

    if ($vote) {
        // Открыть файл выбранного голоса
        $filename = $vote . '.txt';
        $count = (int)file_get_contents($filename);
        $count++;
        file_put_contents($filename, $count);
    }
}

// Чтение результатов голосования
$results = [];
foreach (['2.txt', '3.txt', '4.txt', '5.txt'] as $filename) {
    $results[$filename] = (int)file_get_contents($filename);
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Голосование</title>
</head>
<body>
    <h1>Как вы оцениваете наш товар?</h1>
    <form method="post">
        <input type="radio" name="vote" value="5" checked> Отлично<br>
        <input type="radio" name="vote" value="4"> Хорошо<br>
        <input type="radio" name="vote" value="3"> Удовлетворительно<br>
        <input type="radio" name="vote" value="2"> Плохо<br>
        <input type="submit" value="Проголосовать">
    </form>
    
    <h2>Результаты голосования:</h2>
    <ul>
        <li>Отлично (5): <?= $results['5.txt'] ?></li>
        <li>Хорошо (4): <?= $results['4.txt'] ?></li>
        <li>Удовлетворительно (3): <?= $results['3.txt'] ?></li>
        <li>Плохо (2): <?= $results['2.txt'] ?></li>
    </ul>

    <h2>Диаграмма голосования:</h2>
    <div style="display: flex; margin-top: 20px;">
        <?php foreach ($results as $file => $count): 
            $label = basename($file, '.txt'); ?>
            <div style="width: 20%; text-align: center;">
                <div style="background-color: blue; width: <?= $count * 20 ?>px; height: 20px;"></div>
                <strong><?= $label ?></strong> (<?= $count ?>)
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>