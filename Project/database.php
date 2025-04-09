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
        INSERT INTO post (title, content, image_URL, created_by)
        VALUES (:title, :content, :image_URL, :created_by);
        SQL;
    $statement = $connection->prepare(($query));
    $statement->execute([
        ':title' => $postParams['title'],
        ':content' => $postParams['content'],
        ':imageURL' => $postParams['image_URL'],
        ':createdBy' => $postParams['created_by']
    ]);
    return (int) $connection->lastInsertId();
}

function findPostInDatabase(PDO $connection, int $id): ?array
{
    $query = <<<SQL
        SELECT
          id, title, content, image_URL, created_by
        FROM post
        WHERE id = $id
        SQL;
    $statement = $connection->query($query);
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row ?: null;
}
$post = findPostInDatabase($connection, 2);

if ($post) {
    echo '<div class="post" style="border:1px solid #ddd; padding:20px; margin:20px;">';
    echo '<h2>' . htmlspecialchars($post['title']) . '</h2>';
    if (!empty($post['image_URL'])) {
        $imagePath = '/images/' . $post['image_URL']; 
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
    echo '</div>';
} else {
    echo '<p>Пост не найден</p>';
}
