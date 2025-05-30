<?php
echo <<<HTML
        <div class="content">
        <img class="content__avatar" src="../images/avatars/{$userAvatar}" alt="Аватар">
                <h1 class="content__name">{$name}</h1>
                <div class="content__description">
                    <span class="content__description-information">{$description} </span>
                </div>
                <div class="content__post-number-information">
                    <img src="../images/posts_number_img.png" alt="Посты">
                    <span class="content__post-number">{$quantityImages}</span>
                </div>
                <div class="post_place">
        HTML;
