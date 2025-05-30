<?php
function ValidateId($infoAboutUser): bool
{
    if ((!$infoAboutUser) || ($infoAboutUser == 'id=')) {
        echo "<div style='
        position: fixed;
        top: 40%;
        left: 40%;
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
        header(header: "Refresh: 2; url=http://localhost/home");
        return FALSE;
    } else {
        return TRUE;
    }
}

?>