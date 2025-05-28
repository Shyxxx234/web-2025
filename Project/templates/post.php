<?php
echo <<<HTML
    <div class="post">
    <div class="post__user user-info">
        <img class="user-info__avatar" src="../{$avatar}" alt="Avatar">
        <span class="user-info__name">$name</span>
        <img class="user-info__edit-icon" src="../images/pencil.png" alt="Иконка для редактирования">
    </div>
HTML;
echo "<div class='post__images'>";
foreach ($images as $image) {
    $path = "../images/" . $image;
    echo "<img class='post__photo' src='{$path}' alt='Фото поста'>";
}
$quantityImages = count($images);
if ($quantityImages > 1) {
    $html = <<<HTML
        <div class = "post__indicator">1/{$quantityImages}</div>
        <img class = "post__slider post__slider--left" src="../images/slider_button.png">
        <img class = "post__slider post__slider--right" src="../images/slider_button.png"> 
    HTML;
    echo $html;
};
echo "</div>";
echo <<<HTML
    <div class='post__reactions'>
        <img src='../images/like.png' alt='Реакции'>
        <span class='post__likes'>$likes</span>
    </div>
    <span class='post__text'>$content</span>
    <span class='post__more-btn'>ещё</span>
    <span class='post__time'>$time</span>
</div>
HTML;
?>