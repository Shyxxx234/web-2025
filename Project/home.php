<?php
include("home/home.html");
const FILENAME_POST = 'json/posts.json';
const FILENAME_USER = 'json/users.json';



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
    return [$avatar, $name, $image, $content, $createdAt, $likes, $createdBy];
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
    $currentTime = time();
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

if (isset($jsonDataUser) && $jsonDataUser) {
    $postId = 0;
    foreach ($jsonDataPost as $post) {
        $postId += 1;
        $info = getInfo($jsonDataUser, $jsonDataPost, $postId);
        $avatar = "images/avatars/" . $info[0];
        $postPhoto = "images/" . $info[2];
        $time = timeAgo($info[4]);
        $html = <<<HTML
        <div class="post">
            <div class="user-info">
                <img class="avatar" src= {$avatar} alt="Avatar">
                <span class="avatar-name">$info[1]</span>
                <img class="pencil" src="images/pencil.png" alt="Иконка для редактирования">
            </div>
            <img class="post-photo" src= {$postPhoto} alt="Фото поста">
            <div class="reaction">
                <img src="images/like.png" alt="Реакции">
                <span class="likes">$info[5]</span>
            </div>
            <span class="main-text">$info[3]</span>
            <span class="more-option">ещё</span>
            <span class="time">$time</span>
        </div>
        HTML;
        echo $html;
    }
    echo "</div>";
    echo "</div>";
    echo "</div>";
}

?>