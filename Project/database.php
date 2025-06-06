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
    $allUserId = getAllUsersId($connection);
    var_dump($allUserId);
    $condition = is_numeric($postParams['created_by_user_id']) && strlen($postParams['content']) < 2000;
    if ($condition && in_array($postParams['created_by_user_id'], $allUserId)) {
        $query = <<<SQL
            INSERT INTO post (content, created_by_user_id, created_at, likes)
            VALUES (:content, :created_by_user_id, :created_at, :likes)
        SQL;
        $statement = $connection->prepare($query);
        $statement->execute([
            ':content' => $postParams['content'],
            ':created_by_user_id' => $postParams['created_by_user_id'],
            ':created_at' => date('Y-m-d H:i:s'),
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

function getAllPostsId(PDO $connection): array 
{
    try {
        $sql = "SELECT id FROM post";
        $sql .= " ORDER BY created_at DESC";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    } catch (PDOException $e) {
        error_log("Ошибка при получении списка постов: " . $e->getMessage());
        return [];
    }
}

function getAllUsersId(PDO $connection):array {
    try {
        $sql = "SELECT id FROM user";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    } catch (PDOException $e) {
        error_log("Ошибка при получении списка постов: " . $e->getMessage());
        return [];
    }
}

function findPostInDatabasePost(PDO $connection, int $id): ?array
{
    $query = <<<SQL
        SELECT
          id, content, created_at, created_by_user_id, likes
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
          id, first_name, last_name, avatar, description
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
        FROM image
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