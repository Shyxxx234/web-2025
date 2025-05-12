<?php
echo <<<HTML
    <div class="post">
    <div class="post__user user-info">
        <img class="user-info__avatar" src= "../{$avatar}" alt="Avatar">
        <span class="user-info__name">$info[1]</span>
        <img class="user-info__edit-icon" src="../images/pencil.png" alt="Иконка для редактирования">
    </div>
    <img class="post__photo" src= "../{$postPhoto}" alt="Фото поста">
    <div class="post__reactions">
        <img src="../images/like.png" alt="Реакции">
        <span class="post__likes">$info[5]</span>
    </div>
    <span class="post__text">$info[3]</span>
    <span class="post__more-btn">ещё</span>
    <span class="post__time">$time</span>
</div>
HTML
?>