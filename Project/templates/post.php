<?php
echo <<<HTML
    <div class="post">
    <div class="user-info">
        <img class="avatar" src= "../{$avatar}" alt="Avatar">
        <span class="avatar-name">$info[1]</span>
        <img class="pencil" src="../images/pencil.png" alt="Иконка для редактирования">
    </div>
    <img class="post-photo" src= "../{$postPhoto}" alt="Фото поста">
    <div class="reaction">
        <img src="../images/like.png" alt="Реакции">
        <span class="likes">$info[5]</span>
    </div>
    <span class="main-text">$info[3]</span>
    <span class="more-option">ещё</span>
    <span class="time">$time</span>
</div>
HTML
?>