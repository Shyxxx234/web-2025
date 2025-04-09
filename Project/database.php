<?php
$connection = connectDatabase();
function connectDatabase(): PDO
{
    $dsn = 'mysql:host = 127.0.0.1; dbname = blog';
    $user = 'blog_user';
    $password = 'q1234';
    return new PDO($dsn, $user, $password);
}

function savePostToDatabase(PDO $connection, array $postParams): int
{
    $title = $connection->quote($postParams['title']);
    $content = $connection->quote($postParams['content']);
    $imageURL = $connection->quote($postParams['imageURL']);
    $createdBy = $connection->quote($postParams['createdBy']);
    $query = <<<SQL
        INSERT INTO post (title, content, imageURL, createdBy)
        VALUES (:title, :content, :imageURL, :createdBy);
        SQL;
    $statement = $connection->prepare(($query));
    $statement->execute([
        ':title' => $postParams['title'],
        ':content' => $postParams['content'],
        ':imageURL' => $postParams['imageURL'],
        ':createdBy' => $postParams['createdBy']
    ]);
    return (int) $connection->lastInsertId();
}

function findPostInDatabase(PDO $connection, int $id): ?array
{
    $query = <<<SQL
        SELECT
          id, title, content, imageURL, createdBy
        FROM post
        WHERE id = $id
        SQL;
    $statement = $connection->query($query);
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row ?: null;
}

list($id, $title, $content, $imageURL, $createdBy) = findPostInDatabase($connection, 1);
echo ''. $id . ''. $title . ''. $content;
?>