<?php
include("../../objects/posts.php");

$posts_object = new Posts($databaseHandler);


$postID =(isset($_GET['id']) ? $_GET['id'] : '');


 if(!empty($postID)) {
    

        $posts_object->deletePost($postID);

    } else {
        echo "Error with postID";
    }

   
   

?>