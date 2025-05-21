<?php
echo <<<HTML
    <div class="post">
    <div class="post__user user-info">
        <img class="user-info__avatar" src="../{$avatar}" alt="Avatar">
        <span class="user-info__name">$name</span>
        <img class="user-info__edit-icon" src="../images/pencil.png" alt="Иконка для редактирования">
    </div>
HTML;
$counter = 0;
foreach ($images as $image) {
    $counter--;
    $path = "../images/" . $image;
    echo "<img class='post__photo' src='{$path}' alt='Фото поста' style='z-index: {$counter}'>";
}
;
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