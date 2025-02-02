<?php
// ��������� �����������
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rating = $_POST['rating'];

    // ������� ���� � �������� �������
    $filename = "$rating.txt";
    if (file_exists($filename)) {
        $currentVotes = file_get_contents($filename);
        $currentVotes++;
        file_put_contents($filename, $currentVotes);
    }
}

// ������� �����������
$results = [];
$ratings = [2, 3, 4, 5]; // ������ �� 2 �� 5
foreach ($ratings as $rating) {
    $file = "$rating.txt";
    if (file_exists($file)) {
        $results[$rating] = (int)file_get_contents($file);
    } else {
        $results[$rating] = 0; // ���� ���� �� ����������, ������� 0
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>�����������</title>
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

<h1>��� �� ���������� ��� �������?</h1>
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
    <input type="submit" value="�������������">
</form>

<h2>���������� �����������:</h2>
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
