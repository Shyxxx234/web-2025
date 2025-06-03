<?php
$connection = connectDatabase();
function connectDatabase(): PDO
{
    $dsn = 'mysql:host=127.0.0.1;dbname=blog;charset=utf8mb4';
    $user = 'root';
    $password = '';
    return new PDO($dsn, $user, $password);
}

function savePostToDatabase(PDO $connection, array $postParams, array $images): int
{
    if (is_numeric($postParams['created_by_user_id']) && count($postParams['content']) < 2000) {
        $query = <<<SQL
        INSERT INTO post (content, created_by_user_id, likes)
        VALUES (:content, :created_by_user_id, :likes)
        SQL;
        $statement = $connection->prepare(($query));
        $statement->execute([
            ':content' => $postParams['content'],
            ':created_by_user_id' => $postParams['created_by_user_id'],
            ':likes' => $postParams['likes'] ?? 0
        ]);
        $id = $connection->lastInsertId();
        foreach ($images as $image) {
            $query = <<<SQL
            INSERT INTO image (post_id, image)
            VALUES (:post_id, :image);
        SQL;
            $statement = $connection->prepare($query);
            $statement->execute([
                ':post_id' => $id,
                ':image' => $image
            ]);
        }
    }

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