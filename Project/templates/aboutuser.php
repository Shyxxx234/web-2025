<?php
echo <<<HTML
        <div class="content">
        <img class="content__avatar" src="../{$avatar}" alt="Аватар">
                <h1 class="content__name">{$infoAboutUser['name']}</h1>
                <div class="content__description">
                    <span class="content__description-information">{$infoAboutUser['description']} </span>
                </div>
                <div class="content__post-number-information">
                    <img src="../images/posts_number_img.png" alt="Посты">
                    <span class="content__post-number">{$infoAboutUser['postNumber']}</span>
                </div>
                <div class="post_place">
        HTML;
