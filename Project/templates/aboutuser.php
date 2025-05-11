<?php
echo <<<HTML
        <div class="content">
        <img class="profile-photo" src="../{$avatar}" alt="Аватар">
                <h1 class="name">{$infoAboutUser['name']}</h1>
                <div class="description">
                    <span class="description-information">{$infoAboutUser['description']} </span>
                </div>
                <div class="post-number-information">
                    <img src="../images/posts_number_img.png" alt="Посты">
                    <span class="post-number">{$infoAboutUser['postNumber']}</span>
                </div>
                <div class="post_place">
        HTML;
