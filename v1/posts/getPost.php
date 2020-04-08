<?php
//includes

include("../../objects/posts.php");
include("../../objects/users.php");

$posts_object = new Posts($databaseHandler);
$user_handler = new User($databaseHandler);
//watching if we have post ID and token and watching if token is okej to use

$postID = ( !empty($_GET['id'] ) ? $_GET['id'] : -1 );

$token=(!empty($_GET['token']) ? $_GET['token'] : "");
if($user_handler->validateToken($token) === false){
    echo "<br>";
    echo "invalid token!";
    die;
}  
// fetching one post 
$posts_object->setPostId($postID);
$post=$posts_object->fetchSinglePost();





    echo "<center>";
    
    echo "<span>" . " " . $post['title']. "</br></span><br/>";
    echo "<span>  Description: </span>" . " " . $post['content']. "<br/>";
    echo "<span>  Price: </span>" . " " . $post['price']. "  kr/st" . "<br/>";
    echo "<hr>";
    echo "<a href='../carts/addToCartForm.php?id={$post['id']}&token=$token'>Add to cart</a>";
    echo "<hr>";
    echo "<a href='getAllPosts.php?token={$token}'>Back</a>";
   
    echo "</center>";
    echo "<br/>";

// watching if user is admin
    $isAdmin = $user_handler->isAdmin($token);
    
    if($isAdmin === true) {
        echo "<center>";
        echo "<a href='deletePost.php?id={$post['id']}'> Delete product </a>";
        echo "<br>";
        echo "<a href='../../updatePostForm.php?id={$post['id']}&token={$token}'> Update product </a>";
        echo "</center>";
        die;
    }
   

?>