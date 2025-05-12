<?php
$connection = connectDatabase();
function connectDatabase(): PDO
{
    $dsn = 'mysql:host=127.0.0.1;dbname=blog;charset=utf8mb4';
    $user = 'root';
    $password = '';
    return new PDO($dsn, $user, $password);
}

function savePostToDatabase(PDO $connection, array $postParams): int
{
    $title = $connection->quote($postParams['title']);
    $content = $connection->quote($postParams['content']);
    $image_URL = $connection->quote($postParams['image_URL']);
    $created_by = $connection->quote($postParams['created_by']);
    $query = <<<SQL
        INSERT INTO post (image, content, created_by_user_id, likes)
        VALUES (:image, :content, :created_by_user_id, :likes);
        SQL;
    $statement = $connection->prepare(($query));
    $statement->execute([
        ':image' => $postParams['image'],
        ':content' => $postParams['content'],
        ':creared_by_user_id' => $postParams['created_by_user_id'],
        ':likes' => $postParams['likes'] ?? 0
    ]);
    return (int) $connection->lastInsertId();
}

function findPostInDatabase(PDO $connection, int $id): ?array
{
    $query = <<<SQL
        SELECT
          id, image, content, created_at, created_by_user_id, likes
        FROM post
        WHERE id = $id
        SQL;
    $statement = $connection->query($query);
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row ?: null;
}
$id = 1;
while ($id <= 2) {
    $post = findPostInDatabase($connection, $id);

    if ($post) {
        echo '<div class="post" style="border:1px solid #ddd; padding:20px; margin:20px;">';
        if (!empty($post['image'])) {
            $imagePath = '/images/' . $post['image'];
            $absolutePath = $_SERVER['DOCUMENT_ROOT'] . $imagePath;
            if (file_exists($absolutePath)) {
                echo '<img src="' . htmlspecialchars($imagePath) . '" 
                 alt="Изображение поста" style="max-width:500px; display:block; margin:10px 0;">';
            } else {
                echo '<p style="color:red;">Изображение не найдено по пути: ' .
                htmlspecialchars($absolutePath) . '</p>';
            }
        }

        echo '<div class="content" style="margin:15px 0;">' .
        nl2br(htmlspecialchars($post['content'])) . '</div>';
        echo '<p>Автор: ' . htmlspecialchars($post['created_by_user_id']) . '</p>';
        echo '<p>Лайков: ' . htmlspecialchars($post['likes']) . '</p>';
        echo '<p>Дата: ' . htmlspecialchars($post['created_at']) . '</p>';
        echo '</div>';
    } else {
        echo '<p>Пост не найден</p>';
    }
    $id++;
}
