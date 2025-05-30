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
    $content = $connection->quote($postParams['content']);
    $image = $connection->quote($postParams['image']);
    $created_by_user_id = $connection->quote($postParams['created_by_user_id']);
    $likes = $connection->quote($postParams['likes']);
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

function findPostInDatabasePost(PDO $connection, int $id): ?array
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

function findUserInDatabaseUser(PDO $connection, int $id): ?array
{
    $query = <<<SQL
        SELECT
          id, name, avatar, description, posts
        FROM user
        WHERE id = $id
        SQL;
    $statement = $connection->query($query);
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row ?: null;
}
function findPhoto(PDO $connection, int $post_id): ?array
{
    $query = <<<SQL
        SELECT image 
        FROM images
        WHERE post_id = $post_id
        SQL;
    $statement = $connection->query($query);
    $row = $statement->fetchAll(PDO::FETCH_COLUMN);
    return $row ?: [];
}

function getCountPosts(PDO $connection, string $database): int
{
    $query = "SELECT COUNT(*) FROM $database";
    $statement = $connection->query($query);
    $count = $statement->fetch(PDO::FETCH_NUM);
    return $count[0];
}