<?php
const FILENAME_POST = '../json/posts.json';
const FILENAME_USER = '../json/users.json';
include("../validate.php");
include("../database.php");



$jsonDataPost = json_decode(file_get_contents(FILENAME_POST), true);
$jsonDataUser = json_decode(file_get_contents(FILENAME_USER), true);

$userId = isset($_GET['id']) ? $_GET['id'] : 1;

function getInfo($jsonUser, $jsonPost, $userId, $postId = 1): array|bool
{
    $images = '';
    $createdBy = '';
    $founded = FALSE;
    foreach ($jsonUser as $user) {
        if ($user['id'] == $userId) {
            $founded = TRUE;
            $avatar = $user['avatar'];
            $name = $user['first_name'] . " " . $user['last_name'];
            $description = $user['description'];
        }
    }
    ;
    foreach ($jsonPost as $post) {
        if (($post['created_by_user_id'] == $userId) && ($post['id'] == $postId)) {
            $images = $post['images'];
            $createdBy = $post['created_by_user_id'];
        }
    }
    ;

    if ($founded) {
        return [
            'avatar' => $avatar,
            'name' => $name,
            'description' => $description,
            'images' => $images,
            'createdBy' => $createdBy
        ];
    } else {
        return $founded;
    }

}
/*
$images = [];
$name = '';
$userAvatar = '';
$description = '';
for ($i = 1; $i <= count($jsonDataPost); $i++) {
    $infoAboutUser = getInfo($jsonDataUser, $jsonDataPost, $userId, $i);
    if ((ValidateId($infoAboutUser)) && ($infoAboutUser['createdBy'] == $userId)) {
        $images = array_merge($images, $infoAboutUser['images']);
        if (!$name) {
            $name = $infoAboutUser['name'];
            $userAvatar = $infoAboutUser['avatar'];
            $description = $infoAboutUser['description'];
        }
    }
}
if ($name) {
    $quantityImages = count($images);
    include("profile.html");
    include("../templates/aboutuser.php");
    foreach ($images as $image) {
        $postPhoto = "../images/" . $image;
        echo "<img class='content__image-post' src='../{$postPhoto}' alt='Фотография поста'>";
    }
}*/

$idArray = getAllPostsId($connection);
$infoAboutUser = findUserInDatabaseUser($connection, $userId);
if (ValidateId($infoAboutUser)) {
    include("profile.html");
    $userAvatar = $infoAboutUser['avatar'];
    $name = $infoAboutUser['first_name'] . " " . $infoAboutUser['last_name'];
    $description = $infoAboutUser['description'];
    $count = getCountPosts($connection, 'post');
    $images = [];
    foreach ($idArray as $id) {
        $infoAboutPost = findPostInDatabasePost($connection, $id);
        if ($infoAboutPost['created_by_user_id'] == $userId) {
            $images = array_merge($images, findPhoto($connection, $id));
        }
    }
    $quantityImages = count($images);
    include("../templates/aboutuser.php");

    for ($i = 0; $i < $quantityImages; $i++) {
        $postPhoto = "../images/" . $images[$i];
        echo "<img class='content__image-post' src='../{$postPhoto}' alt='Фотография поста'>";
    }
}
?>