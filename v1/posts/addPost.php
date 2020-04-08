<?php
//includes
include("../../objects/posts.php");
$posts_object = new Posts($databaseHandler);
//whatching if we have title, content, price
$title_IN = ( isset($_GET['title']) ? $_GET['title'] : '' );
$content_IN = ( isset($_GET['content']) ? $_GET['content'] : '' );
$price_IN = (isset($_GET['price']) ? $_GET['price'] : '');

// if we have calling on function addPost, error if we not
 if(!empty($title_IN)) {
    if(!empty($content_IN)) {

        $posts_object->addPost($title_IN, $content_IN, $price_IN);

    } else {
        echo "Error: content cannot be empty!";
    }
} else {
    echo "Error: titel cannot be empty!";
}  



?>