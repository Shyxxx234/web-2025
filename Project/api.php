<?php
include("database.php");

if (isset($_POST)) {
    try {
        if (isset($_FILES['image']) && !empty($_FILES['image']['name'][0])) {
            $path = $_FILES['image']['tmp_name'];
            $image = $_FILES['image']['name'];
            foreach ($path as $key => $el) {
                if (!move_uploaded_file($el, "images/" . $image[$key])) {
                    echo "Error";
                }
            }
            if (isset($path)) {
                savePostToDatabase($connection, $_POST, $image);
            }
        } else {
            echo "Картинки не были переданы";
        }
    } catch (WrongQuery) {
        echo "Неправильный запрос";
    }
}

?>