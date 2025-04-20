<?php
include("profile/profile.html");
const FILENAME_POST = 'json/posts.json';
const FILENAME_USER = 'json/users.json';



$jsonDataPost = json_decode(file_get_contents(FILENAME_POST), true);
$jsonDataUser = json_decode(file_get_contents(FILENAME_USER), true);
if (isset($_GET['id']))
{
    $userId = $_GET['id'];
} else {
    $userId = 1;
}

function getInfo($jsonUser, $jsonPost, $userId, $postId = 1)
{
    $image = '';
    $createdBy = '';
    foreach ($jsonUser as $user) {
        if ($user['id'] == $userId) {
            $avatar = $user['avatar'];
            $name = $user['name'];
            $description = $user['description'];
            $postNumber = $user['posts'];
        }
    }
    ;
    foreach ($jsonPost as $post) {
        if (($post['created_by_user_id'] == $userId) && ($post['id'] == $postId)){
            $image = $post['image'];
            $createdBy = $post['created_by_user_id'];
        } 
    };

    return [$avatar, $name, $description, $postNumber, $image, $createdBy];
}

if (isset($jsonDataUser) && $jsonDataUser) {
    $infoAboutUser = getInfo($jsonDataUser, $jsonDataPost, $userId, 1);
    $avatar = "images/avatars/" . $infoAboutUser[0];
    $aboutUser = <<<HTML
    <div class="content">
    <img class="profile-photo" src={$avatar} alt="Аватар">
            <h1 class="name">$infoAboutUser[1]</h1>
            <div class="description">
                <span class="description-information">$infoAboutUser[2] </span>
            </div>
            <div class="post-number-information">
                <img src="images/posts_number_img.png" alt="Посты">
                <span class="post-number">$infoAboutUser[3]</span>
            </div>
            <div class="post_place">
    HTML;
    echo $aboutUser;
    $postId = 0;
    foreach ($jsonDataPost as $post) {
        $postId += 1;
        $info = getInfo($jsonDataUser, $jsonDataPost, $userId, $postId);
        if ($info[5] == $userId) {
            $postPhoto = "images/" . $info[4];
            $html = <<<HTML
            <img class="image-post" src={$postPhoto} alt="Фотография поста">
            HTML;
            echo $html;
        }
    }
    echo "</div>";
    echo "</div>";
    echo "</div>";
}

?>