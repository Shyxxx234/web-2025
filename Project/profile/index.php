<?php
const FILENAME_POST = '../json/posts.json';
const FILENAME_USER = '../json/users.json';
include("../validate.php");



$jsonDataPost = json_decode(file_get_contents(FILENAME_POST), true);
$jsonDataUser = json_decode(file_get_contents(FILENAME_USER), true);

$userId = isset($_GET['id']) ? $_GET['id'] : 1;

function getInfo($jsonUser, $jsonPost, $userId, $postId = 1): array|bool
{
    $image = '';
    $createdBy = '';
    $founded = FALSE;
    foreach ($jsonUser as $user) {
        if ($user['id'] == $userId) {
            $founded = TRUE;
            $avatar = $user['avatar'];
            $name = $user['name'];
            $description = $user['description'];
            $postNumber = $user['posts'];
        }
    }
    ;
    foreach ($jsonPost as $post) {
        if (($post['created_by_user_id'] == $userId) && ($post['id'] == $postId)) {
            $image = $post['image'];
            $createdBy = $post['created_by_user_id'];
        }
    }
    ;

    if ($founded) {
        return [
            'avatar' => $avatar,
            'name' => $name,
            'description' => $description,
            'postNumber' => $postNumber,
            'image' => $image,
            'createdBy' => $createdBy
        ];
    } else {
        return $founded;
    }

}

if (isset($jsonDataUser) && $jsonDataUser) {
    $infoAboutUser = getInfo($jsonDataUser, $jsonDataPost, $userId, 1);
    if (ValiadteId($infoAboutUser)) {
        include("profile.html");
        $avatar = "../images/avatars/" . $infoAboutUser['avatar'];
        include("../templates/aboutuser.php");
        $postId = 0;
        foreach ($jsonDataPost as $post) {
            $postId += 1;
            $info = getInfo($jsonDataUser, $jsonDataPost, $userId, $postId);
            if ($info['createdBy'] == $userId) {
                $postPhoto = "../images/" . $info['image'];
                echo "<img class='content__image-post' src='../{$postPhoto}' alt='Фотография поста'>";
            }
        }
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
}
?>