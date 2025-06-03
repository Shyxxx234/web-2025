<?php
include("database.php");

if (isset($_POST)) {
    $path = $_FILES['image']['tmp_name'];
    $image = $_FILES['image']['name'];
    foreach ($path as $key => $el) {
        if(!move_uploaded_file($el, "images/" . $image[$key])) {
            echo "Error";
        }
    };
    savePostToDatabase($connection, $_POST, $image);
}

?>