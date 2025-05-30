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
            $name = $user['name'];
            $description = $user['description'];
        }
    }
    ;
    foreach ($jsonPost as $post) {
        if (($post['created_by_user_id'] == $userId) && ($post['id'] == $postId)) {
            $images = $post['image'];
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
;
if ($name) {
    $quantityImages = count($images);
    include("profile.html");
    include("../templates/aboutuser.php");
    foreach ($images as $image) {
        $postPhoto = "../images/" . $image;
        echo "<img class='content__image-post' src='../{$postPhoto}' alt='Фотография поста'>";
    }
}

/*
$postCounter = count($jsonDataPost);
for ($i = 0; $i < $postCounter; $i++) {
    if (isset($jsonDataUser)) {
        $infoAboutUser = getInfo($jsonDataUser, $jsonDataPost, $userId, $i);
        if ((ValiadteId($infoAboutUser)) && ($infoAboutUser['createdBy'] == $userId)) {
            
            $quantityImages = count($infoAboutUser['images']);
            include("profile.html");
            $avatar = "../images/avatars/" . $infoAboutUser['avatar'];
            include("../templates/aboutuser.php");
            $postId = 0;
            foreach ($jsonDataPost as $post) {
                $postId += 1;
                $info = getInfo($jsonDataUser, $jsonDataPost, $userId, $postId);
                if ($info['createdBy'] == $userId) {
                    foreach ($info['images'] as $photo) {
                        $postPhoto = "../images/" . $photo;
                        echo "<img class='content__image-post' src='../{$postPhoto}' alt='Фотография поста'>";
                    }
                }
            }
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    }
}
    */


/*
$infoAboutUser = findUserInDatabaseUser($connection, $userId);
if (ValiadteId($infoAboutUser)) {
    include("profile.html");
    $avatar = "../images/avatars/" . $infoAboutUser['avatar'];
    include("../templates/aboutuser.php");
    $images = findPhoto($connection, $userId);
    $counter = 0;
    for($i = 0; $i < count($images); $i++) {
        $postPhoto = "../images/" . $images[$i];
        $counter++;
        echo "<img class='content__image-post' src='../{$postPhoto}' alt='Фотография поста'>";
    }
    echo "</div>";
    echo "</div>";
    echo "</div>";
} */
?>