<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newItem = $_POST['item'] ?? '';
    if (!empty($newItem)) {
        file_put_contents('data.txt', $newItem . "\n", FILE_APPEND);
    }
}
$items = file('data.txt');
?>
<!DOCTYPE html>
<html>
<body>
    <h1>Список элементов</h1>
    <form method="POST">
        <input type="text" name="item" placeholder="Новый элемент" required>
        <button type="submit">Добавить</button>
    </form>
    <ul>
        <?php foreach ($items as $item): ?>
            <li><?php echo $item ?></li>
        <?php endforeach; ?>
    </ul>
    <p>Всего элементов: <?php echo count($items) ?></>
</body>
</html>