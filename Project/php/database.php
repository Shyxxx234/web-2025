<?php
$connection = connectDatabase();
function connectDatabase(): PDO{
    $dsn = 'mysql:host = 127.0.0.1; dbname = blog';
    $user = 'blog_user';
    $password = 'q1234';
    return new PDO($dsn, $user, $password);
}

function savePostToDatabase(PDO $connection, array $postParams): int {
    $title = $connection -> quote($postParams['title']);
    $content = $connection -> quote($postParams['content']);
    $imageURL= $connection -> quote($postParams['imageURL']);
    $createdBy = $connection -> quote($postParams['createdBy']);
    $query = <<<SQL
        INSERT INTO post (title, content, imageURL, createdBy)
        VALUES (:title, :content, :imageURL, :createdBy);
        SQL;
    $statement = $connection -> prepare(($query));
    $statement -> execute([
        ':title' => $postParams['title'], 
        ':content' => $postParams['content'],
        ':imageURL' => $postParams['imageURL'],
        ':createdBy' => $postParams['createdBy']
    ]);
    return (int)$connection -> lastInsertId();
}



$postId = savePostToDatabase($connection, [
    'title' => ''
    ])
?>