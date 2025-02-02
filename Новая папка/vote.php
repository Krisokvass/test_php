<?php
// Обработка голосования
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rating = $_POST['rating'];

    // Открыть файл и обновить счетчик
    $filename = "$rating.txt";
    if (file_exists($filename)) {
        $currentVotes = file_get_contents($filename);
        $currentVotes++;
        file_put_contents($filename, $currentVotes);
    }
}

// Подсчет результатов
$results = [];
$ratings = [2, 3, 4, 5]; // Оценки от 2 до 5
foreach ($ratings as $rating) {
    $file = "$rating.txt";
    if (file_exists($file)) {
        $results[$rating] = (int)file_get_contents($file);
    } else {
        $results[$rating] = 0; // Если файл не существует, голосов 0
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Голосование</title>
    <style>
        .bar {
            width: 50px;
            background-color: blue;
            margin: 5px;
            display: inline-block;
        }
    </style>
</head>
<body>

<h1>Как вы оцениваете наш магазин?</h1>
<form method="post">
    <label>
        <input type="radio" name="rating" value="2"> 2
    </label>
    <label>
        <input type="radio" name="rating" value="3"> 3
    </label>
    <label>
        <input type="radio" name="rating" value="4"> 4
    </label>
    <label>
        <input type="radio" name="rating" value="5"> 5
    </label>
    <br>
    <input type="submit" value="Проголосовать">
</form>

<h2>Результаты голосования:</h2>
<div>
    <?php foreach ($results as $rating => $count): ?>
        <div>
            <strong><?php echo $rating; ?></strong>: <?php echo $count; ?>
            <div class="bar" style="height: <?php echo $count * 20; ?>px;"></div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
