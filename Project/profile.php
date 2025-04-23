<?php
const FILENAME_POST = 'json/posts.json';
const FILENAME_USER = 'json/users.json';



$jsonDataPost = json_decode(file_get_contents(FILENAME_POST), true);
$jsonDataUser = json_decode(file_get_contents(FILENAME_USER), true);

$userId = isset($_GET['id']) ? $_GET['id']: 1;

function getInfo($jsonUser, $jsonPost, $userId, $postId = 1):array | bool
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
    };
    foreach ($jsonPost as $post) {
        if (($post['created_by_user_id'] == $userId) && ($post['id'] == $postId)){
            $image = $post['image'];
            $createdBy = $post['created_by_user_id'];
        } 
    };

    if ($founded)
    {
        return ['avatar' => $avatar, 
        'name' => $name, 
        'description' => $description, 
        'postNumber' => $postNumber, 
        'image' => $image, 
        'createdBy' => $createdBy];
    } else {
        return $founded;
    }
    
}

if (isset($jsonDataUser) && $jsonDataUser) {
    $infoAboutUser = getInfo($jsonDataUser, $jsonDataPost, $userId, 1);
    if (!$infoAboutUser) {
        echo "<div style='
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: red;
        font-size: 18px;
        padding: 15px;
        background: #fff3f3;
        border: 1px solid #ffb3b3;
        border-radius: 5px;
        z-index: 1000;
    '>
        Пользователя с таким id не существует
    </div>
    ";
        header(header: "Refresh: 2; url=http://localhost/home.php");
        exit;
    } else {
        include("profile/profile.html");
        $avatar = "images/avatars/" . $infoAboutUser['avatar'];
        $aboutUser = <<<HTML
        <div class="content">
        <img class="profile-photo" src={$avatar} alt="Аватар">
                <h1 class="name">{$infoAboutUser['name']}</h1>
                <div class="description">
                    <span class="description-information">{$infoAboutUser['description']} </span>
                </div>
                <div class="post-number-information">
                    <img src="images/posts_number_img.png" alt="Посты">
                    <span class="post-number">{$infoAboutUser['postNumber']}</span>
                </div>
                <div class="post_place">
        HTML;
    }
    echo $aboutUser;
    $postId = 0;
    foreach ($jsonDataPost as $post) {
        $postId += 1;
        $info = getInfo($jsonDataUser, $jsonDataPost, $userId, $postId);
        if ($info['createdBy'] == $userId) {
            $postPhoto = "images/" . $info['image'];
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