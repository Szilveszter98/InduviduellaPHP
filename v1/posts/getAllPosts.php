<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<center>
    <h1> Welcome to the product site!</h1>
</center>
<hr>
</body>
</html>
<?php
include("../../objects/posts.php");
include("../../objects/users.php");

$posts_object = new Posts($databaseHandler);
$user_handler = new User($databaseHandler);


$token =  ( !empty($_GET['id'] ) ? $_GET['id'] : "" );

if($user_handler->validateToken($token) === false){
    echo "<br>";
    echo "invalid token!";
    die;
}  

foreach($posts_object->fetchAllPosts() as $post){

     echo "<center>";
    
    echo "<span><h1>" . " " . $post['title']. "</h1></br></span><br/>";
    echo "<span>  Description: </span>" . " " . $post['content']. "<br/>";
    echo "<span><h3>  Price: </span>" . " " . $post['price']. "  kr/st" . "</h3><br/>";
    
    
    echo "<hr>";
    echo "<a href='getPost.php?token={$token}&id={$post['id']}'>{$post['title']}</a>";
    echo "</br>";
    echo "<a href='../carts/addToCartForm.php?id={$post['id']}&token={$token}'>Add to cart</a>";
    echo "<br/>";
    echo "<a href='../carts/getAllCarts.php?token={$token}'> To the checkout </a>";
    echo "<hr>";
     echo "</center>";


}




?>