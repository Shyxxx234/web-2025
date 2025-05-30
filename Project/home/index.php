<?php
include("home.html");
include("../database.php");

const FILENAME_POST = '../json/posts.json';
const FILENAME_USER = '../json/users.json';

$jsonDataPost = json_decode(file_get_contents(FILENAME_POST), true);
$jsonDataUser = json_decode(file_get_contents(FILENAME_USER), true);



function getInfo($jsonUser, $jsonPost, $id)
{
    foreach ($jsonPost as $post) {
        if ($post['id'] == $id) {
            $image = $post['image'];
            $content = $post['content'];
            $createdBy = $post['created_by_user_id'];
            $createdAt = $post['created_at'];
            $likes = $post['likes'];
        }
    }
    ;
    foreach ($jsonUser as $user) {
        if ($user['id'] == $createdBy) {
            $avatar = $user['avatar'];
            $name = $user['name'];
        }
    }
    ;
    return [
        'avatar' => $avatar,
        'name' => $name,
        'images' => $image,
        'content' => $content,
        'created_at' => $createdAt,
        'likes' => $likes,
        'created_by_user_id' => $createdBy
    ];
}

function pluralize($number, $one, $few, $many)
{
    $lastDigit = $number % 10;
    $lastTwoDigits = $number % 100;

    if ($lastTwoDigits >= 11 && $lastTwoDigits <= 19) {
        return "$number $many";
    }
    if ($lastDigit == 1) {
        return "$number $one";
    }
    if ($lastDigit >= 2 && $lastDigit <= 4) {
        return "$number $few";
    }
    return "$number $many";
}

function timeAgo($timestamp)
{
    $currentTime = (new DateTime('now', new DateTimeZone('UTC')))->getTimestamp();
    $diffInSeconds = $currentTime - $timestamp;

    if ($diffInSeconds < 60) {
        return "только что";
    }

    $diffInMinutes = floor($diffInSeconds / 60);
    if ($diffInMinutes < 60) {
        return pluralize($diffInMinutes, 'минута', 'минуты', 'минут') . " назад";
    }

    $diffInHours = floor($diffInMinutes / 60);
    if ($diffInHours < 24) {
        return pluralize($diffInHours, 'час', 'часа', 'часов') . " назад";
    }

    $diffInDays = floor($diffInHours / 24);
    if ($diffInDays == 1) {
        return "вчера";
    } elseif ($diffInDays < 30) {
        return pluralize($diffInDays, 'день', 'дня', 'дней') . " назад";
    }

    $diffInMonths = floor($diffInDays / 30);
    if ($diffInMonths < 12) {
        return pluralize($diffInMonths, 'месяц', 'месяца', 'месяцев') . " назад";
    }

    $diffInYears = floor($diffInDays / 365);
    return pluralize($diffInYears, 'год', 'года', 'лет') . " назад";
}
$userId = isset($_GET['id']) ? $_GET['id'] : null;

if (isset($jsonDataUser) && $jsonDataUser) {
    foreach ($jsonDataPost as $post) {
        if ($userId && $post['created_by_user_id'] != $userId) continue;
        $info = getInfo($jsonDataUser, $jsonDataPost, $post['id']);
        $avatar = "../images/avatars/" . $info['avatar'];
        $name = $info['name'];
        $likes = $info['likes'];
        $content = $info['content'];
        $images = $info['images'];
        $time = timeAgo($info['created_at']);
        include("../templates/post.php");
    }
    echo "</div>";
    echo "</div>";
    echo "</div>";
} 
/*
$count = getCountPosts($connection, 'post');
for ($id = 1; $id <= $count; $id++) {
    $post = findPostInDatabasePost($connection, $id);
    $images = findPhoto($connection, $id);
    $user = findUserInDatabaseUser($connection, $post['created_by_user_id']);
    if ($post) {
        if ($userId && $post['created_by_user_id'] != $userId)
            continue;
        $avatar = "../images/avatars/" . $user['avatar'];
        $name = $user['name'];
        $likes = $post['likes'];
        $content = $post['content'];
        $time = timeAgo(strtotime($post['created_at']));
        include("../templates/post.php");
    }
} */
echo <<<HTML
            <div class="page__modal-window"></div>
        HTML;
echo "</div>";
echo "</div>";
echo "</div>";

?>